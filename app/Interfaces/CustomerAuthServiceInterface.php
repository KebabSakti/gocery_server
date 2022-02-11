<?php

namespace App\Interfaces;

interface CustomerAuthServiceInterface {
    public function grantAccess($token);

    public function revokeAccess($request);
}