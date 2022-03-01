<?php

namespace App\Services;

use App\Interfaces\AddressServiceInterface;
use App\Models\ShippingAddress;

class AddressService implements AddressServiceInterface
{
    public function getAddresses($request)
    {
        $addresses = ShippingAddress::all();

        return $addresses;
    }

    public function getCustomerAddress($request)
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
}
