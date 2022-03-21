<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Interfaces\CustomerEventServiceInterface;
use Illuminate\Http\Request;

class CustomerEventController extends Controller
{
    private $service;

    public function __construct(CustomerEventServiceInterface $service)
    {
        $this->service = $service;
    }

    public function courier_request_status(Request $request)
    {
        $this->service->courier_request_status($request);

        return response()->json($request->toArray());
    }
}
