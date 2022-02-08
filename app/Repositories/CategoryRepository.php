<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    public static function getAllcategory() {
        $categories = Category::orderBy('order_number', 'asc')->get();

        return $categories;
    }
}