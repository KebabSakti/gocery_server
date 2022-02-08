<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CustomerAccountResource;
use App\Interfaces\CustomerAccountServiceInterface;

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
}