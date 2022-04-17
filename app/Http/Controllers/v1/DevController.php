<?php

namespace App\Http\Controllers\v1;

use App\Events\OrderStatusEvent;
use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResorce;
use App\Models\CourierOrder;
use App\Models\CourierProfile;
use App\Models\OrderStatus;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DevController extends Controller
{
    public function partners(Request $request)
    {
        $datas = Partner::whereHas('couriers')
            ->where('active', true)
            ->get();

        $result = PartnerResorce::collection($datas);

        return $result;
    }

    public function acceptOrder(Request $request)
    {
        DB::transaction(function () use ($request) {
            $orderStatus = OrderStatus::where('order_uid', $request->order_uid)->first();

            if ($orderStatus == null) {
                abort(404, 'Orderan tidak ditemukan');
            }

            if (!empty($orderStatus->status)) {
                abort(404, 'Orderan tidak ditemukan');
            }

            $orderStatus->update(['status' => 'AKTIF']);

            CourierOrder::create([
                'order_uid' => $request->order_uid,
                'courier_account_uid' => $request->user()->uid,
                'uid' => Str::uuid(),
                'status' => 'AKTIF',
            ]);

            CourierProfile::where('courier_account_uid', $request->user()->uid)->update([
                'status' => 'BUSY',
            ]);

            event(new OrderStatusEvent($request->order_uid, $request));
        });
    }

    public function rejectOrder(Request $request)
    {
        DB::transaction(function () use ($request) {
            $courierOrder = CourierOrder::where('order_uid', $request->order_uid)
                ->where('status', '!=', null)
                ->first();

            if ($courierOrder == null) {
                CourierOrder::create([
                    'order_uid' => $request->order_uid,
                    'courier_account_uid' => $request->user()->uid,
                    'uid' => Str::uuid(),
                ]);
            }
        });
    }
}
