<?php

namespace App\Interfaces;

interface ProductServiceInterface {
    public function productFilterQuery($request);

    public function getProductByUid($uid);

    public function toggleProductFavourite($request);
}