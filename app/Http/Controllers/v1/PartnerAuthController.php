<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Interfaces\PartnerAuthServiceInterface;
use Illuminate\Http\Request;

class PartnerAuthController extends Controller
{
    private $service;

    public function __construct(PartnerAuthServiceInterface $service)
    {
        $this->service = $service;
    }

    public function access(Request $request)
    {
        $data = $this->service->access($request);

        return response()->json(['token' => $data]);
    }

    public function revoke(Request $request)
    {
        $this->service->revoke($request);
    }
}
