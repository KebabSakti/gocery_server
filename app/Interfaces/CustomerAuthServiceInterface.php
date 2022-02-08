<?php

namespace App\Interfaces;

interface CustomerAuthServiceInterface {
    public function getFirebaseUser($token);

    public function giveUserAccess($firebaseUser);

    public function removeUserAccess($request);
}