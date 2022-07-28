<?php

namespace App\Providers;

use App\Repositories\Interfaces\ShTlRepositoryInterface;
use App\Repositories\ShTlRepository;
use App\Repositories\Interfaces\IcRepositoryInterface;
use App\Repositories\IcRepository;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use App\Repositories\StoreRepository;


use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ShTlRepositoryInterface::class, ShTlRepository::class);
        $this->app->bind(ManagerRepositoryInterface::class, ManagerRepository::class);
        $this->app->bind(IcRepositoryInterface::class, IcRepository::class);
        $this->app->bind(StoreRepositoryInterface::class, StoreRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (env('APP_ENV') !== 'local') {
        //      $this->app['request']->server->set('HTTPS', true);
        // }
        Paginator::useBootstrap();
    
    }
}
