<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Models\Yatch;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\YatchController;

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
        view()->composer('cruise.includes._header', function ($view) {
            $view->with('yachts', Yatch::all());
        });

        view()->composer('cruise.packages', function ($view) {
            $view->with('yachts', Yatch::all());
        });
    }
}
