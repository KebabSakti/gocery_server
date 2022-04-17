<?php

namespace App\Interfaces;

interface PaymentServiceInterface
{
    public function getPaymentChannels();

    public function getDefaultPaymentChannel($request);

    public function ewallet($request);

    public function qr($request);

    public function va($request);

    public function retail($request);
}
