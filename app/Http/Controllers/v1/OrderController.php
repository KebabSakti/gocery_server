<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourierProfileResource;
use App\Http\Resources\OrderFeeResource;
use App\Http\Resources\ShippingAddressResource;
use App\Http\Resources\ShippingTimeResource;
use App\Interfaces\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $service;

    public function __construct(OrderServiceInterface $service)
    {
        $this->service = $service;
    }

    public function address(Request $request)
    {
        $address = $this->service->getLastAddressUsed($request);

        $resource = new ShippingAddressResource($address);

        return $resource;
    }

    public function fee(Request $request)
    {
        $ships = $this->service->getFeeDetail($request);

        $resource = OrderFeeResource::collection($ships);

        return $resource;
    }

    public function time(Request $request)
    {
        $times = $this->service->getShippingTimes($request);

        $resource = ShippingTimeResource::collection($times);

        return $resource;
    }

    public function find_courier(Request $request)
    {
        $couriers = $this->service->findCourier($request);

        $resource = CourierProfileResource::collection($couriers);

        return $resource;
    }

    public function stock(Request $request)
    {
        $data = $this->service->checkItemStock($request);

        return response()->json($data > 0 ? true : false);
    }

    public function store(Request $request)
    {

    }
}
