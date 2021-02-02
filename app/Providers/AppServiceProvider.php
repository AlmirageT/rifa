<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\NumeroObserver;
use App\Numero;

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
        Numero::observe(NumeroObserver::class);
    }
}
