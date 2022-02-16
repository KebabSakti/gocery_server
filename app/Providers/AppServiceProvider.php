<?php

namespace App\Providers;

use App\Interfaces\BannerServiceInterface;
use App\Interfaces\BundleServiceInterface;
use App\Interfaces\CartServiceInterface;
use App\Interfaces\CategoryServiceInterface;
use App\Interfaces\CustomerAccountServiceInterface;
use App\Interfaces\CustomerAuthServiceInterface;
use App\Interfaces\FcmTokenServiceInterface;
use App\Interfaces\ProductServiceInterface;
use App\Interfaces\SearchServiceInterface;
use App\Services\BannerService;
use App\Services\BundleService;
use App\Services\CartService;
use App\Services\CategoryService;
use App\Services\CustomerAccountService;
use App\Services\CustomerAuthService;
use App\Services\FcmTokenService;
use App\Services\ProductService;
use App\Services\SearchService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //CUSTOMER AUTH
        $this->app->bind(CustomerAuthServiceInterface::class, function () {
            return new CustomerAuthService();
        });

        //CUSTOMER ACCOUNT
        $this->app->bind(CustomerAccountServiceInterface::class, function () {
            return new CustomerAccountService();
        });

        //FCM TOKEN
        $this->app->bind(FcmTokenServiceInterface::class, function () {
            return new FcmTokenService();
        });

        //CATEGORY
        $this->app->bind(CategoryServiceInterface::class, function () {
            return new CategoryService();
        });

        //BANNER
        $this->app->bind(BannerServiceInterface::class, function () {
            return new BannerService();
        });

        //PRODUCT
        $this->app->bind(ProductServiceInterface::class, function () {
            return new ProductService();
        });

        //BUNDLE
        $this->app->bind(BundleServiceInterface::class, function () {
            return new BundleService();
        });

        //SEARCH
        $this->app->bind(SearchServiceInterface::class, function () {
            return new SearchService();
        });

        //CART
        $this->app->bind(CartServiceInterface::class, function () {
            return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
    }
}
