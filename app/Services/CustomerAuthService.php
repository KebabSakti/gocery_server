<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Models\CustomerPoint;
use App\Models\CustomerAccount;
use App\Models\CustomerProfile;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerPointHistory;
use App\Interfaces\CustomerAuthServiceInterface;

class CustomerAuthService implements CustomerAuthServiceInterface {
    public function giveUserAccess($token) {
        $firebaseUser = $this->getFirebaseUser($token);

        $firebaseUserProvider = $firebaseUser->providerData[0];

        //use email or phone number as username
        $username = $firebaseUserProvider->email ?? $firebaseUserProvider->phoneNumber;

        $customer = CustomerAccount::where('username', $username)->first();

        if($customer == null) {
            $customer = $this->createCustomerAccount([
                'username' => $username,
                'name' => $firebaseUserProvider->displayName,
                'email' => $firebaseUserProvider->email,
                'phone' => $firebaseUserProvider->phoneNumber,
                'picture' => $firebaseUserProvider->photoUrl,
            ]);
        }

        return $customer;
    }

    public function removeUserAccess($request) {
        $user = $request->user();

        $user->tokens()->delete();
    }

    private function getFirebaseUser($token) {
        $firebaseAuth = app('firebase.auth');
            
        $verifiedIdToken = $firebaseAuth->verifyIdToken($token);

        $uid = $verifiedIdToken->claims()->get('sub');

        $user = $firebaseAuth->getUser($uid);

        return $user;
    }

    private function createCustomerAccount($param)
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
}