<?php

namespace App\Interfaces;

interface FcmTokenServiceInterface {
    public function storeToken($request);
}