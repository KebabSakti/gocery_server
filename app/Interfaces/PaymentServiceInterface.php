<?php

namespace App\Interfaces;

interface PaymentServiceInterface
{
    public function getPaymentChannels();

    public function getDefaultPaymentChannel();
}
