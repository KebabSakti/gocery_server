<?php

namespace App\Http\Controllers\v1;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerFcm;
use Illuminate\Support\Facades\Auth;

class FcmTokenController extends Controller
{
    public function store(Request $request)
    {
        CustomerFcm::updateOrCreate(
            [
                'customer_account_uid' => Auth::user()->uid,
                
            ],
            [
                'uid' => Str::uuid(),
                'fcm_token' => $request->fcm_token
            ],
        );
    }
}
