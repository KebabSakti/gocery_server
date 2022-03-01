<?php

namespace App\Services;

use App\Interfaces\OrderServiceInterface;
use App\Models\Partner;
use App\Models\ShippingAddress;
use App\Models\ShippingTime;

class OrderService implements OrderServiceInterface
{
    public function getLastAddressUsed($request)
    {
        $address = ShippingAddress::select('shipping_addresses.*')
            ->join('orders', function ($join) use ($request) {
                $join->on('shipping_addresses.order_uid', '=', 'orders.uid')
                    ->where('orders.customer_account_uid', $request->user()->uid);
            })
            ->orderByDesc('orders.created_at')
            ->first();

        return $address;
    }

    public function getFeeDetail($request)
    {
        $types = explode(',', preg_replace('/\s+/', '', $request->type));

        $query = Partner::selectRaw('*, st_distance_sphere(point(longitude, latitude), point(?,?)) / 1000 as distance', [$request->longitude, $request->latitude])
            ->where('online', true)
            ->where('active', true)
            ->whereIn('type', $types)
            ->orderBy('distance', 'asc');

        if (in_array('GAS', $types) && in_array('GROCERY', $types)) {
            $query->where('exclusive', true);
        }

        $shippings = $query->get()->groupBy('type');

        foreach ($shippings as $item) {
            $ship[] = $item[0];
        }

        return $ship;
    }

    public function getShippingTimes($request)
    {
        $times = ShippingTime::where('active', 1)->get();

        return $times;
    }

    public function submitOrder($request)
    {}
}
