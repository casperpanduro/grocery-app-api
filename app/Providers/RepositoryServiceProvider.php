<?php

namespace App\Providers;

use App\Interfaces\GroceryListRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\GroceryListRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(GroceryListRepositoryInterface::class, GroceryListRepository::class);
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
