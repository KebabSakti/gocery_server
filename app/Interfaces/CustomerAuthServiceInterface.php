<?php

namespace App\Interfaces;

interface CustomerAuthServiceInterface {
    // public function getFirebaseUser($token);

    public function giveUserAccess($token);

    public function removeUserAccess($request);
}