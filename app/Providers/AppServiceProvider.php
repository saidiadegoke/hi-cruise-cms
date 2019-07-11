<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view) {
            $view->with('sessionUser', Auth::user());
        });
        // view()->composer('cruise.home', function ($view) {
        //     $view->with('data', HomeController::yatchEventDetails());
        // });
    }
}
