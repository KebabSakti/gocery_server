<?php

namespace App\Services;

use App\Models\CustomerFcm;
use Illuminate\Support\Str;
use App\Interfaces\FcmTokenServiceInterface;

class FcmTokenService implements FcmTokenServiceInterface {
    public function storeToken($request) {
        CustomerFcm::updateOrCreate(
            [
                'customer_account_uid' => $request->user()->uid,
                
            ],
            [
                'uid' => Str::uuid(),
                'fcm_token' => $request->fcm_token
            ],
        );
    }
}