<?php

namespace App\Services;

use App\Interfaces\BannerServiceInterface;
use App\Repositories\BannerRepository;

class BannerService implements BannerServiceInterface {
    public function getAllBanner() {
        $banners = BannerRepository::getAllBanner();

        return $banners;
    }
}