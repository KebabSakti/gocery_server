<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

//API V1
Route::group(['prefix' => 'v1'], function () {

    //CUSTOMER
    Route::group(['prefix' => 'customer'], function () {
        //AUTH
        Route::group(['prefix' => 'auth'], function () {
            Route::post('access', [v1\CustomerAuthController::class, 'access']);
            Route::group(['middleware' => 'auth:customer'], function () {
                Route::get('revoke', [v1\CustomerAuthController::class, 'revoke']);
            });
        });

        Route::group(['middleware' => 'auth:customer'], function () {
            //CUSTOMER ACCOUNT
            Route::group(['prefix' => 'user'], function () {
                Route::get('/', [v1\CustomerAccountController::class, 'show']);
                Route::post('fcm', [v1\FcmTokenController::class, 'store']);
            });

            //CATEGORIES
            Route::group(['prefix' => 'categories'], function () {
                Route::get('/', [v1\CategoryController::class, 'index']);
            });

            //BANNERS
            Route::group(['prefix' => 'banners'], function () {
                Route::get('/', [v1\BannerController::class, 'index']);
            });

            //PRODUCT
            Route::group(['prefix' => 'products'], function () {
                Route::get('/', [v1\ProductController::class, 'index']);
                Route::get('{uid}/show', [v1\ProductController::class, 'show']);
                Route::get('histories', [v1\ProductController::class, 'histories']);
                Route::post('favourite', [v1\ProductController::class, 'favourite']);
                Route::post('statistic', [v1\ProductController::class, 'statistic']);
            });

            //BUNDLE
            Route::group(['prefix' => 'bundles'], function () {
                Route::get('/', [v1\BundleController::class, 'index']);
            });

            //SEARCH
            Route::group(['prefix' => 'searches'], function () {
                Route::get('/', [v1\SearchController::class, 'index']);
                Route::post('/', [v1\SearchController::class, 'store']);
                Route::delete('/', [v1\SearchController::class, 'delete']);
                Route::get('suggestions', [v1\SearchController::class, 'suggestion']);
            });

            //CART
            Route::group(['prefix' => 'carts'], function () {
                Route::get('/', [v1\CartController::class, 'index']);
                Route::post('/', [v1\CartController::class, 'update']);
                Route::delete('/', [v1\CartController::class, 'delete']);
            });

            //ORDER
            Route::group(['prefix' => 'orders'], function () {
                Route::get('addresses', [v1\OrderController::class, 'address']);
                Route::get('fees', [v1\OrderController::class, 'fee']);
                Route::get('times', [v1\OrderController::class, 'time']);
                Route::get('couriers/finds', [v1\OrderController::class, 'find_courier']);
            });

            //VOUCHER
            Route::group(['prefix' => 'vouchers'], function () {
                Route::get('/', [v1\VoucherController::class, 'index']);
                Route::get('default', [v1\VoucherController::class, 'default_voucher']);
            });

            //PAYMENT
            Route::group(['prefix' => 'payments'], function () {
                Route::get('channels', [v1\PaymentController::class, 'channel']);
                Route::get('channels/default', [v1\PaymentController::class, 'channel_default']);
            });

        });
    });

});
