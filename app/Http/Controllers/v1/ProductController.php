<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $service;

    public function __construct(ProductServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $products = $this->service->getFilteredProduct($request)->paginate(10);

        $collections = ProductResource::collection($products);

        return $collections;
    }

    public function show(Request $request)
    {
        $product = $this->service->getProductByUid($request);

        $resource = new ProductResource($product);

        return $resource;
    }

    public function favourite(Request $request)
    {
        $product = $this->service->toggleProductFavourite($request);

        return $product;
    }

    public function statistic(Request $request)
    {
        $this->service->statistic($request);
    }

    public function histories(Request $request)
    {
        $histories = $this->service->viewHistories($request);

        $collections = ProductResource::collection($histories);

        return $collections;
    }
}
