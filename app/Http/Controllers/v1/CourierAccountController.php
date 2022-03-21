<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResorce;
use App\Interfaces\CourierAccountServiceInterface;
use Illuminate\Http\Request;

class CourierAccountController extends Controller
{
    private $service;

    public function __construct(CourierAccountServiceInterface $service)
    {
        $this->service = $service;
    }

    public function account(Request $request)
    {
        $data = $this->service->getUserAccount($request);

        $result = new PartnerResorce($data);

        return $result;
    }

    public function status(Request $request)
    {
        $this->service->updateStatus($request);
    }
}
