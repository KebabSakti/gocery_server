<?php

namespace App\Services;

use App\Interfaces\PaymentServiceInterface;
use App\Models\PaymentChannel;
use Illuminate\Support\Facades\Http;

class PaymentService implements PaymentServiceInterface
{

    private static function instance()
    {
        $instance = Http::withHeaders([
            'Authorization' => 'Basic eG5kX2RldmVsb3BtZW50X1E1UnF4VTh6bTFRNFB3SkZmaEx4MkVnOXZUTG55ZWJGNnc1T2xnSnc1SmFGS2lNektQTm9zSDgyM2JYYUk1Og==',
            'Accept' => 'application/json',
        ]);

        return $instance;
    }

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

    public function ewallet($request)
    {
        $response = $this->instance()->post('https://api.xendit.co/ewallets/charges', [
            'reference_id' => $request->reference_id,
            'channel_code' => $request->channel_code,
            'amount' => $request->amount,
            'currency' => 'IDR',
            'checkout_method' => 'ONE_TIME_PAYMENT',
            'channel_properties' => [
                'mobile_number' => $request->mobile_number,
                'success_redirect_url' => '',
                'failure_redirect_url' => '',
                'cancel_redirect_url' => '',
            ],
        ]);

        if ($response->clientError()) {
            abort(400);
        }

        if ($response->serverError()) {
            abort(500);
        }

        return $response;
    }

    public function qr($request)
    {}

    public function va($request)
    {}

    public function retail($request)
    {}
}
