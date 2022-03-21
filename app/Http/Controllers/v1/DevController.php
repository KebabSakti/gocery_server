<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\PartnerResorce;
use App\Models\Partner;
use Illuminate\Http\Request;

class DevController extends Controller
{
    public function partners(Request $request)
    {
        $datas = Partner::whereHas('couriers')
            ->where('active', true)
            ->get();

        $result = PartnerResorce::collection($datas);

        return $result;
    }
}
