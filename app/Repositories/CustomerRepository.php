<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Models\CustomerPoint;
use App\Models\CustomerAccount;
use App\Models\CustomerProfile;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerPointHistory;

class CustomerRepository {
    public static function createCustomerAccount($username, $name, $email, $phoneNumber, $picture)
    {
        DB::transaction(function () use($username, $name, $email, $phoneNumber, $picture) {
            $uid = Str::uuid();

            //create customer account
            CustomerAccount::create([
                'uid' => $uid,
                'username' => $username,
            ]);

            //create customer profile
            CustomerProfile::create([
                'customer_account_uid'  => $uid,
                'uid' => Str::uuid(),
                'name' => $name,
                'email' => $email,
                'phone' => $phoneNumber,
                'picture' => $picture,
            ]);

            //create customer point and history
            CustomerPoint::create([
                'customer_account_uid' => $uid,
                'uid' => Str::uuid(),
                'point' => 0,
    
            ]);
            CustomerPointHistory::create([
                'customer_account_uid' => $uid,
                'point' => 0,
                'action' => 'IN',
            ]);
        });
    }

    public static function showCustomerAccount($username)
    {
        $customer = CustomerAccount::where('username', $username)->first();

        return $customer;
    }
}