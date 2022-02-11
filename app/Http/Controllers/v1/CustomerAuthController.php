<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerAuthResource;
use App\Interfaces\CustomerAuthServiceInterface;
use Kreait\Firebase\Exception\Auth\FailedToVerifyToken;

class CustomerAuthController extends Controller
{
    private $service;

    public function __construct(CustomerAuthServiceInterface $service)
    {   
        $this->service = $service;
    }
    
    public function access(Request $request)
    {
        try {
            $customer = $this->service->grantAccess($request->token);

            $customerAuthResource = new CustomerAuthResource($customer);

            return $customerAuthResource;
        }catch(FailedToVerifyToken $e) {
            return response()->json([
                'message' => 'Akses tidak di izinkan'
            ], 401);
        }
    }

    public function revoke(Request $request)
    {
        $this->service->revokeAccess($request);
    }
}