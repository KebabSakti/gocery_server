<?php

namespace App\Services;

use App\Models\Bundle;
use App\Interfaces\BundleServiceInterface;

class BundleService implements BundleServiceInterface {
    public function getAllBundle() {
        $bundles = Bundle::has('bundle_items')
                         ->where('hidden', false)
                         ->where('active', true)
                         ->get();

        return $bundles;
    }
}