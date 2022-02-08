<?php

namespace App\Services;

use App\Interfaces\FcmTokenServiceInterface;
use App\Repositories\CustomerFcmRepository;

class FcmTokenService implements FcmTokenServiceInterface {
    public function storeToken($request) {
        CustomerFcmRepository::storeToken($request);
    }
}