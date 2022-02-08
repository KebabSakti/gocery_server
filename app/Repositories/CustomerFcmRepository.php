<?php

namespace App\Repositories;

use App\Models\CustomerFcm;
use Illuminate\Support\Str;

class CustomerFcmRepository {
    public static function storeToken($request) {
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