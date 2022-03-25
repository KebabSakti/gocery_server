<?php

namespace App\Interfaces;

interface OrderServiceInterface
{
    public function getLastAddressUsed($request);

    public function getFeeDetail($request);

    public function getShippingTimes($request);

    public function findCourier($request);

    public function acceptOrder($request);

    public function rejectOrder($request);

    public function cancelOrder($request);

    public function submitOrder($request);

    public function checkItemStock($request);
}
