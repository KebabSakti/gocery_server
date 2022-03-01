<?php

namespace App\Services;

use App\Interfaces\PaymentServiceInterface;
use App\Models\PaymentChannel;

class PaymentService implements PaymentServiceInterface
{
    public function getPaymentChannels()
    {
        $payments = PaymentChannel::where('active', true)->orderBy('ordering', 'asc')->get();

        return $payments;
    }

    public function getDefaultPaymentChannel()
    {
        $payment = PaymentChannel::where('active', true)
            ->where('default', true)
            ->first();

        return $payment;
    }
}
