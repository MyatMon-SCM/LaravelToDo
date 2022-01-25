<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Dao Registration
        $this->app->bind('App\Contracts\Dao\Todo\TodoDaoInterface', 'App\Dao\Todo\TodoDao');

        // Business logic registration
        $this->app->bind('App\Contracts\Services\Todo\TodoServiceInterface', 'App\Service\Todo\TodoService');
     }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
