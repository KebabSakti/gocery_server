<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Str;
use App\Models\ProductFavourite;
use App\Interfaces\ProductServiceInterface;

class ProductService implements ProductServiceInterface {
    public function productFilterQuery($request) {
        $query =  Product::select('products.*')
                         ->join('product_statistics', 'products.uid', '=', 'product_statistics.product_uid')
                         ->where('products.active', true);

        //FILTER START====================================================

        if(!empty($request->shipping)) {
            $query->where('products.shipping', $request->shipping);
        }

        if($request->has('category')) {
            $query->where('products.category_uid', $request->category);
        }

        if($request->has('name')) {
            $query->where('products.name', 'like', '%'.$request->name.'%');
        }

        if($request->has('bundle')) {
            $query->whereIn('products.uid', function($q) use($request) {
                $q->select('bundle_items.product_uid')
                  ->from('bundle_items')
                  ->join('bundles', 'bundle_items.bundle_uid', '=', 'bundles.uid')
                  ->where('bundle_items.bundle_uid', $request->bundle)
                  ->where('bundles.active', true);
            });
        }

        //FILTER END======================================================

        //SORTING START===================================================

        if($request->has('sorting')) {
            switch($request->sorting)
            {
                case 'price':
                   return $query->reorder('products.final_price', 'asc');

                case 'discount':
                   return $query->reorder('products.discount', 'desc');

                case 'point':
                   return $query->reorder('products.point', 'desc');

                case 'sold':
                   return $query->reorder('product_statistics.sold', 'desc');

                case 'view':
                   return $query->reorder('product_statistics.view', 'desc');

                default:
            }
        }

        //SORTING END====================================================

        return $query;
    }

    public function getProductByUid($uid) {
        $product = Product::where('uid', $uid)->first();

        return $product;
    }

    public function toggleProductFavourite($request) {
        $favourite = ProductFavourite::where('uid', $request->uid)
                                     ->where('customer_account_uid', $request->user()->uid)
                                     ->first();

        if($favourite == null) {
            ProductFavourite::create([
                'product_uid' => $request->uid,
                'customer_account_uid' => $request->user()->uid,
                'uid' => Str::uuid(),
            ]);
        }else{
            $favourite->delete();
        }
    }
}