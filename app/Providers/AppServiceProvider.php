<?php

namespace App\Providers;

use App\Interfaces\BannerServiceInterface;
use App\Interfaces\BundleServiceInterface;
use App\Interfaces\CategoryServiceInterface;
use App\Services\FcmTokenService;
use App\Services\CustomerAuthService;
use Illuminate\Support\ServiceProvider;
use App\Services\CustomerAccountService;
use App\Interfaces\FcmTokenServiceInterface;
use App\Interfaces\CustomerAuthServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Interfaces\CustomerAccountServiceInterface;
use App\Interfaces\ProductServiceInterface;
use App\Services\BannerService;
use App\Services\BundleService;
use App\Services\CategoryService;
use App\Services\ProductService;

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
