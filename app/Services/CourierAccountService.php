<?php

namespace App\Services;

use App\Interfaces\CourierAccountServiceInterface;
use App\Models\CourierProfile;
use App\Models\Partner;

class CourierAccountService implements CourierAccountServiceInterface
{
    public function getUserAccount($request)
    {
        $user = Partner::with(['couriers' => function ($q) use ($request) {
            $q->where('uid', $request->user()->uid);
        }])
            ->where('uid', $request->user()->partner_uid)
            ->where('active', true)
            ->firstOrFail();

        return $user;
    }

    public function updateStatus($request)
    {
        CourierProfile::where('courier_account_uid', $request->user()->uid)
            ->update(['status' => $request->status]);
    }
}
