<?php

namespace App\Http\Controllers\v1;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('order_number', 'asc')->get();

        $collections =  CategoryResource::collection($categories);

        return $collections;
        
    }
}
