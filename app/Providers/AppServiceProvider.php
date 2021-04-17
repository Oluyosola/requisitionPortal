<?php

namespace App\Providers;

use App\Repositories\Interfaces\ShTlRepositoryInterface;
use App\Repositories\ShTlRepository;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        Paginator::useBootstrap();
    
    }
}
