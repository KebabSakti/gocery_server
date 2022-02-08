<?php

namespace App\Providers;

use App\Services\CustomerAuthService;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CustomerAuthServiceInterface;
use Illuminate\Http\Resources\Json\JsonResource;

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
