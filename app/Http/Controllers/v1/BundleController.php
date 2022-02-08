<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\BundleResource;
use App\Models\Bundle;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index(Request $request)
    {
        $bundles = Bundle::has('bundle_items')
                         ->where('hidden', false)
                         ->where('active', true)
                         ->get();

        $collections =  BundleResource::collection($bundles);

        return $collections;
    }
}
