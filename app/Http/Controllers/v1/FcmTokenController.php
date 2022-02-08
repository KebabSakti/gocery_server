<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\FcmTokenServiceInterface;

class FcmTokenController extends Controller
{
    private $service;

    public function __construct(FcmTokenServiceInterface $service)
    {   
        $this->service = $service;
    }

    public function store(Request $request)
    {
        $this->service->storeToken($request);
    }
}
