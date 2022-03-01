<?php

namespace App\Services;

use App\Models\AppConfig;
use App\Models\ShippingTime;
use App\Models\Voucher;
use App\Models\VoucherHistory;
use Carbon\Carbon;

class UtilityService
{
    public static function getShippingFee($request)
    {
        $shipping = $request->shipping == 'LANGSUNG' ? 'LANGSUNG_FEE' : 'TERJADWAL_FEE';

        $fee = AppConfig::where('key', $shipping)->first();

        $price = $request->shipping == 'LANGSUNG' ? $fee->value * $request->distance : $fee->value;

        return round($price / 1000) * 1000;
    }

    public static function getClosestShippingTime($request)
    {

        $now = Carbon::now('Asia/Kuala_Lumpur')->toTimeString();

        $ship = ShippingTime::whereTime('time', '>', $now)
            ->where('active', 1)
            ->first();

        if ($ship == null) {
            return 'TUTUP';
        }

        if ($request->shipping == 'LANGSUNG') {
            return 'LANGSUNG';
        }

        $format = Carbon::createFromFormat('H:i:s', $ship->time)->format('h:i A');

        return $format;
    }

    public static function timeIsEnabled($time)
    {
        $now = Carbon::now('Asia/Kuala_Lumpur');
        $time = Carbon::createFromFormat('H:i:s', $time, 'Asia/Kuala_Lumpur');

        if ($now->lessThan($time)) {
            return true;
        }

        return false;
    }

    public static function autoApplyVoucher($request)
    {
        $now = Carbon::now();

        // $vouchers = Voucher::where('max', '>', function ($query) use ($request) {
        //     $query->selectRaw('count(voucher_histories.voucher_uid)')
        //         ->from('voucher_histories')
        //         ->join('orders', 'voucher_histories.order_uid', '=', 'orders.uid')
        //         ->where('orders.customer_account_uid', $request->user()->uid)
        //         ->groupBy('voucher_histories.voucher_uid');
        // })
        //     ->whereDate('start_at', '<=', $now->toDateString())
        //     ->whereDate('expired_at', '>=', $now->toDateString())
        //     ->get();

        // $vouchers = Voucher::with(['histories' => function ($query) use ($request) {
        //     $query->join('orders', 'voucher_histories.order_uid', '=', 'orders.uid')
        //         ->where('orders.customer_account_uid', $request->user()->uid);
        // }])->get();

        $query = Voucher::whereDate('start_at', '<=', $now->toDateString())
            ->whereDate('expired_at', '>=', $now->toDateString())
            ->where('hidden', false)
            ->where('active', true)
            ->get();

        $vouchers = [];

        foreach ($query as $voucher) {
            $history = VoucherHistory::selectRaw('count(voucher_histories.voucher_uid) as used')
                ->join('orders', 'voucher_histories.order_uid', '=', 'orders.uid')
                ->where('voucher_histories.voucher_uid', $voucher->uid)
                ->where('orders.customer_account_uid', $request->user()->uid)
                ->groupBy('voucher_histories.voucher_uid')
                ->first();

            if ($history != null) {
                if ($voucher->max > $history->used) {
                    array_push($vouchers, $voucher);
                }
            }

            if ($history == null) {
                array_push($vouchers, $voucher);
            }
        }

        return $vouchers;
    }
}
