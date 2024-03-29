<?php

namespace App\Services;

use App\Http\Resources\ProductResource;
use App\Interfaces\ProductServiceInterface;
use App\Models\Product;
use App\Models\ProductFavourite;
use App\Models\ProductStatistic;
use App\Models\ProductViewHistory;
use Illuminate\Support\Str;

class ProductService implements ProductServiceInterface
{
    public function getFilteredProduct($request)
    {
        $query = Product::select('products.*')
            ->join('product_statistics', 'products.uid', '=', 'product_statistics.product_uid')
            ->where('products.active', true);

        //FILTER START====================================================

        if (!empty($request->shipping)) {
            $query->where('products.shipping', $request->shipping);
        }

        if (!empty($request->category)) {
            $query->where('products.category_uid', $request->category);
        }

        if (!empty($request->name)) {
            $query->where('products.name', 'like', '%' . $request->name . '%');
        }

        if (!empty($request->bundle)) {
            $query->whereIn('products.uid', function ($q) use ($request) {
                $q->select('bundle_items.product_uid')
                    ->from('bundle_items')
                    ->join('bundles', 'bundle_items.bundle_uid', '=', 'bundles.uid')
                    ->where('bundle_items.bundle_uid', $request->bundle)
                    ->where('bundles.active', true);
            });
        }

        //FILTER END======================================================

        //SORTING START===================================================

        if ($request->has('sorting')) {
            switch ($request->sorting) {
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

                case 'search':
                    return $query->reorder('product_statistics.search', 'desc');

                default:
            }
        }

        //SORTING END====================================================

        return $query;
    }

    public function getProductByUid($request)
    {
        $product = Product::where('uid', $request->uid)->first();

        ProductViewHistory::create([
            'customer_account_uid' => $request->user()->uid,
            'product_uid' => $request->uid,
        ]);

        return $product;
    }

    public function toggleProductFavourite($request)
    {
        $favourite = ProductFavourite::where('product_uid', $request->uid)
            ->where('customer_account_uid', $request->user()->uid)
            ->first();

        if ($favourite == null) {
            ProductFavourite::create([
                'product_uid' => $request->uid,
                'customer_account_uid' => $request->user()->uid,
                'uid' => Str::uuid(),
            ]);
        } else {
            $favourite->delete();
        }

        $product = new ProductResource(Product::where('uid', $request->uid)->first());

        return $product;
    }

    public function statistic($request)
    {
        $statistic = ProductStatistic::where('product_uid', $request->product_uid)->first();

        if ($request->target == 'favourite') {
            $statistic->update([
                'favourite' => $statistic->favourite + 1,
            ]);
        }

        if ($request->target == 'sold') {
            $statistic->update([
                'sold' => $statistic->sold + 1,
            ]);
        }

        if ($request->target == 'view') {
            $statistic->update([
                'view' => $statistic->view + 1,
            ]);
        }

        if ($request->target == 'search') {
            $statistic->update([
                'search' => $statistic->search + 1,
            ]);
        }
    }

    public function viewHistories($request)
    {
        $histories = Product::whereIn('uid', function ($q) use ($request) {
            $q->select('product_uid')
                ->from('product_view_histories')
                ->where('customer_account_uid', $request->user()->uid)
                ->groupBy('product_uid')
                ->get();
        })
            ->orderByDesc(
                ProductViewHistory::select('created_at')
                    ->whereColumn('product_uid', 'products.uid')
                    ->orderByDesc('created_at')
                    ->limit(1)
            )
            ->limit(10)->get();

        return $histories;
    }
}
