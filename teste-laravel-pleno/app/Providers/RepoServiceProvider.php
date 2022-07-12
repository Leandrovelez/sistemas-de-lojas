<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Product\ProductRepositoryInterface;
use App\Repositories\Product\ProductRepository;
use App\Interfaces\Store\StoreRepositoryInterface;
use App\Repositories\Store\StoreRepository;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
