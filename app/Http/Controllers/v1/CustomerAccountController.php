<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerAccountResource;
use App\Interfaces\CustomerAccountServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAccountController extends Controller
{
    private $service;

    public function __construct(CustomerAccountServiceInterface $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        $user = $this->service->getCustomerAccount(Auth::user()->id);

        $resource = new CustomerAccountResource($user);

        return $resource;
    }

    public function private_event(Request $request)
    {
        $user = $request->user();

        return response()->json($user);
    }
}
