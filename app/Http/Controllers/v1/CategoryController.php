<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Interfaces\CategoryServiceInterface;

class CategoryController extends Controller
{
    private $service;

    public function __construct(CategoryServiceInterface $service)
    {   
        $this->service = $service;
    }

    public function index()
    {
        $categories = $this->service->getAllcategory();

        $collections =  CategoryResource::collection($categories);

        return $collections;
    }
}
