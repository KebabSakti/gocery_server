<?php

namespace App\Services;

use App\Interfaces\OrderServiceInterface;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\ShippingTime;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderService implements OrderServiceInterface
{
    public function getLastAddressUsed($request)
    {
        $address = ShippingAddress::select('shipping_addresses.*')
            ->leftJoin('orders', function ($join) use ($request) {
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

        $ship = [];
        foreach ($shippings as $item) {
            array_push($ship, $item[0]);
        }

        return $ship;
    }

    public function getShippingTimes($request)
    {
        $times = ShippingTime::where('active', 1)->get();

        return $times;
    }

    public function findCourier($request)
    {
        // $couriers = CourierAccount::selectRaw('courier_accounts.partner_uid, courier_profiles.*')
        //     ->join('courier_profiles', 'courier_accounts.uid', '=', 'courier_profiles.courier_account_uid')
        //     ->where('courier_accounts.active', true)
        //     ->where('courier_profiles.status', 'READY')
        //     ->get();

        $partners = $request->partners;

        foreach ($partners as $partner) {
            // event(new RequestCourier($partner->uid, $request->order_uid));
        }
    }

    public function acceptOrder($request)
    {
    }

    public function rejectOrder($request)
    {
    }

    public function cancelOrder($request)
    {
    }

    public function submitOrder($request)
    {
        DB::transaction(function () use ($request) {
            $qty = [];
            $price = [];
            $shipping = [];
            $app_fee = [];
            $voucher = [];
            $point = [];
            $total = [];

            //cart items
            foreach ($request->items as $cartItem) {
                $product = Product::where('uid', $cartItem['product_uid'])->firstOrFail();

                OrderItem::create([
                    'order_uid' => $request->uid,
                    'product_uid' => $cartItem['product_uid'],
                    'uid' => Str::uuid(),
                    'name' => $product->name,
                    'description' => $product->description,
                    'image' => $product->image,
                    'price' => $product->price,
                    'discount' => $product->discount,
                    'final_price' => $product->final_price,
                    'unit' => $product->unit,
                    'unit_count' => $product->unit_count,
                    'min_order' => $product->min_order,
                    'max_order' => $product->max_order,
                    'stok' => $product->stok,
                    'item_qty_total' => $cartItem['item_qty_total'],
                    'item_price_total' => $product->final_price * $cartItem['item_qty_total'],
                    'note' => $cartItem['note'],
                ]);
            }

            //shipping address
            ShippingAddress::create([
                'order_uid' => $request->uid,
                'uid' => Str::uuid(),
                'place_id' => $request->delivery['place_id'],
                'address' => $request->delivery['address'],
                'latitude' => $request->delivery['latitude'],
                'longitude' => $request->delivery['longitude'],
                'note' => $request->delivery['note'],
                'name' => $request->delivery['name'],
                'phone' => $request->delivery['phone'],
            ]);

            //order
            Order::create([
                'customer_account_uid' => $request->user()->uid,
                'uid' => Str::uuid(),
                'invoice' => 'INV-' . mt_rand(000001, 999999),
                'qty_total' => $request->qty_total,
                'price_total' => $request->price_total,
                'shipping_fee' => $request->shipping_fee,
                'app_fee' => $request->app_fee,
                'voucher_deduction' => $request->voucher_deduction,
                'point_deduction' => $request->point_deduction,
                'pay_total' => $request->pay_total,
            ]);
        });
    }

    public function checkItemStock($request)
    {
        $uids = explode(',', preg_replace('/\s+/', '', $request->uids));

        $datas = Product::where('stok', '>', 0)
            ->whereIn('uid', $uids)
            ->get();

        $total = $datas->count();

        return $total;
    }
}
