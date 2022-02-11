<?php

namespace App\Interfaces;

interface ProductServiceInterface {
    public function productFilterQuery($request);

    public function getProductByUid($request);

    public function toggleProductFavourite($request);
}