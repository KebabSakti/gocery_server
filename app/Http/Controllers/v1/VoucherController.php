<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\VoucherResource;
use App\Interfaces\VoucherServiceInterface;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    private $service;

    public function __construct(VoucherServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $vouchers = $this->service->autoApplyVoucher($request);

        $resource = VoucherResource::collection($vouchers);

        return $resource;
    }

    public function default_voucher(Request $request)
    {
        $vouchers = $this->service->autoApplyVoucher($request);

        $resource = VoucherResource::collection($vouchers);

        return $resource;
    }
}
