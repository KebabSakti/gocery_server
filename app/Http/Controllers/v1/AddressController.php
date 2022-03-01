<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ShippingAddressResource;
use App\Interfaces\AddressServiceInterface;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private $service;

    public function __construct(AddressServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $addresses = $this->service->getAddresses($request);

        $collections = ShippingAddressResource::collection($addresses);

        return $collections;
    }

    public function last(Request $request)
    {
        $address = $this->service->getCustomerAddress($request);

        $resource = new ShippingAddressResource($address);

        return $resource;
    }
}
