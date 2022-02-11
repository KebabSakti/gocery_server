<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

//API V1
Route::group(['prefix' => 'v1'], function() {

    //CUSTOMER
    Route::group(['prefix' => 'customer'], function() {
        //AUTH
        Route::group(['prefix' => 'auth'], function() {
            Route::post('access', [v1\CustomerAuthController::class, 'access']);
            Route::group(['middleware' => 'auth:customer'], function() {
                Route::get('revoke', [v1\CustomerAuthController::class, 'revoke']);
            });
        });

        Route::group(['middleware' => 'auth:customer'], function() {
            //CUSTOMER ACCOUNT
            Route::group(['prefix' => 'user'], function() {
                Route::get('/', [v1\CustomerAccountController::class, 'show']);
                Route::post('fcm', [v1\FcmTokenController::class, 'store']);
            });

            //CATEGORIES
            Route::group(['prefix' => 'categories'], function() {
                Route::get('/', [v1\CategoryController::class, 'index']);
            });

            //BANNERS
            Route::group(['prefix' => 'banners'], function() {
                Route::get('/', [v1\BannerController::class, 'index']);
            });

            //PRODUCT
            Route::group(['prefix' => 'products'], function() {
                Route::get('/', [v1\ProductController::class, 'index']);
                Route::get('{uid}', [v1\ProductController::class, 'show']);
                Route::post('favourite', [v1\ProductController::class, 'favourite']);
                Route::post('statistic', [v1\ProductController::class, 'statistic']);
            });

            //BUNDLE
            Route::group(['prefix' => 'bundles'], function() {
                Route::get('/', [v1\BundleController::class, 'index']);
            });
        });
    });

});
