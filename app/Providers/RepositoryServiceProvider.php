<?php
namespace App\Providers;
use App\Repositories\Interfaces\ManagerRepositoryInterface;
use App\Repositories\ManagerRepository;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\ServiceProvider;


class RepositoryServiceProvider extends ServiceProvider{
    public function register()
        {
    $this->app->bind(ManagerRepositoryInterface::class, ManagerRepository::class,);
        }
    
}