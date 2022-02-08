<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Interfaces\BannerServiceInterface;

class BannerController extends Controller
{
    private $service;

    public function __construct(BannerServiceInterface $service)
    {   
        $this->service = $service;
    }

    public function index()
    {
        $banners = $this->service->getAllBanner();

        $collections =  BannerResource::collection($banners);

        return $collections;
       
    }
}
