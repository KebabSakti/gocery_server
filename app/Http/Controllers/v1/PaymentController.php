<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaymentChannelResource;
use App\Interfaces\PaymentServiceInterface;

class PaymentController extends Controller
{
    private $service;

    public function __construct(PaymentServiceInterface $service)
    {
        $this->service = $service;
    }

    public function channel()
    {
        $channels = $this->service->getPaymentChannels();

        $result = PaymentChannelResource::collection($channels);

        return $result;
    }

    public function channel_default()
    {
        $channel = $this->service->getDefaultPaymentChannel();

        $result = new PaymentChannelResource($channel);

        return $result;
    }
}
