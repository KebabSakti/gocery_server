<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BundleResource;
use App\Interfaces\BundleServiceInterface;

class BundleController extends Controller
{
    private $service;

    public function __construct(BundleServiceInterface $service)
    {   
        $this->service = $service;
    }

    public function index()
    {
        $bundles = $this->service->getAllBundle();

        $collections =  BundleResource::collection($bundles);

        return $collections;
    }
}
