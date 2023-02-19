<?php

namespace App\Providers;

use App\Repositories\Contracts\IProductRepository;
use App\Repositories\ProductRepository;
use App\Services\Contracts\IProductService;
use App\Services\ProductService;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(IProductService::class, ProductService::class);
        $this->app->bind(IProductRepository::class, ProductRepository::class);
    }
}
