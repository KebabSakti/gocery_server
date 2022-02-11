<?php

namespace App\Services;

use App\Models\Banner;
use App\Interfaces\BannerServiceInterface;

class BannerService implements BannerServiceInterface {
    public function getAllBanner() {
        $banners = Banner::orderBy('created_at', 'desc')->get();

        return $banners;
    }
}