<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use App\Models\CustomerPoint;
use App\Models\CustomerAccount;
use App\Models\CustomerProfile;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerPointHistory;

class CustomerRepository {
    public static function createCustomerAccount($param)
    {
        DB::transaction(function () use($param) {
            $uid = Str::uuid();

            //create customer account
            CustomerAccount::create([
                'uid' => $uid,
                'username' => $param['username'],
            ]);

            //create customer profile
            CustomerProfile::create([
                'customer_account_uid'  => $uid,
                'uid' => Str::uuid(),
                'name' => $param['name'],
                'email' => $param['email'],
                'phone' => $param['phoneNumber'],
                'picture' => $param['picture'],
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

    public static function showCustomerAccountByUsername($username)
    {
        $customer = CustomerAccount::where('username', $username)->first();

        return $customer;
    }

    public static function showCustomerAccountById($id)
    {
        $customer = CustomerAccount::find($id);

        return $customer;
    }
}