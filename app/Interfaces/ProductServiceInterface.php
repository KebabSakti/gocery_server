<?php

namespace App\Interfaces;

interface ProductServiceInterface {
    public function getFilteredProduct($request);

    public function getProductByUid($request);

    public function toggleProductFavourite($request);

    public function statistic($request);

    public function viewHistories($request);
}