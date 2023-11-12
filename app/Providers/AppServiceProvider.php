<?php

namespace App\Providers;

use App\Interfaces\FlagApiInterface;
use App\Services\FlagApis\RestCountriesApi;
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
        $this->app->bind(FlagApiInterface::class, RestCountriesApi::class);
    }
}
