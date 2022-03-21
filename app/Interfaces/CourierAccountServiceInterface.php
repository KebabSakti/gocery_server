<?php

namespace App\Interfaces;

interface CourierAccountServiceInterface
{
    public function getUserAccount($request);

    public function updateStatus($request);
}
