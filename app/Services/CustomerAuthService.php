<?php

namespace App\Services;

use App\Models\CustomerAccount;
use App\Repositories\CustomerRepository;
use App\Interfaces\CustomerAuthServiceInterface;

class CustomerAuthService implements CustomerAuthServiceInterface {
    public function getFirebaseUser($token) {
        $firebaseAuth = app('firebase.auth');
            
        $verifiedIdToken = $firebaseAuth->verifyIdToken($token);

        $uid = $verifiedIdToken->claims()->get('sub');

        $user = $firebaseAuth->getUser($uid);

        return $user;
    }

    public function giveUserAccess($firebaseUser) {
        $firebaseUserProvider = $firebaseUser->providerData[0];

        //use email or phone number as username
        $username = $firebaseUserProvider->email ?? $firebaseUserProvider->phoneNumber;

        $customer = CustomerRepository::showCustomerAccount($username);

        if($customer == null) {
            //create customer account
            $customer = CustomerRepository::createCustomerAccount(
                $firebaseUserProvider->username,
                $firebaseUserProvider->displayName,
                $firebaseUserProvider->email,
                $firebaseUserProvider->phoneNumber,
                $firebaseUserProvider->photoUrl,
            );
        }

        return $customer;
    }

    public function removeUserAccess($request) {
        $user = $request->user();

        $user->tokens()->delete();
    }
}