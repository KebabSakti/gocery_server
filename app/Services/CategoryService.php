<?php

namespace App\Services;

use App\Models\Category;
use App\Interfaces\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface {
    public function getAllcategory() {
        $categories = Category::orderBy('order_number', 'asc')->get();

        return $categories;
    }
}