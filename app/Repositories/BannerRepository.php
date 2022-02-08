<?php

namespace App\Repositories;

use App\Models\Banner;

class BannerRepository {
    public static function getAllBanner() {
        $banners = Banner::orderBy('created_at', 'desc')->get();

        return $banners;
    }
}