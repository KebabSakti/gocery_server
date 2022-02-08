<?php

namespace App\Http\Controllers\v1;

use Exception;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('created_at', 'desc')->get();

        $collections =  BannerResource::collection($banners);

        return $collections;
       
    }
}
