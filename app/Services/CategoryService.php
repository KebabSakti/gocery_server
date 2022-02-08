<?php

namespace App\Services;

use App\Interfaces\CategoryServiceInterface;
use App\Repositories\CategoryRepository;

class CategoryService implements CategoryServiceInterface {
    public function getAllcategory() {
        $categories = CategoryRepository::getAllcategory();

        return $categories;
    }
}