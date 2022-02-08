<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductServiceInterface;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductServiceInterface $service)
    {   
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $products = $this->service->productFilterQuery($request)->paginate(10);

        $collections =  ProductResource::collection($products);

        return $collections;
    }

    public function show($uid)
    {
        $product = $this->service->getProductByUid($uid);

        $resource = new ProductResource($product);

        return $resource;
    }

    public function favourite(Request $request)
    {
        $this->service->toggleProductFavourite($request);
    }
}
