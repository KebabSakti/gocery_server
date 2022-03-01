<?php

namespace App\Interfaces;

interface OrderServiceInterface
{
    public function getLastAddressUsed($request);

    public function getFeeDetail($request);

    public function getShippingTimes($request);

    public function submitOrder($request);
}
