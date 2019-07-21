<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Models\Yacht;
use App\Models\Slide;

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


        view()->composer("cruise.home", function ($view) {
            $slides = Slide::where(["published" => true])->orderBy('order', 'DESC')->get();
            $view->with('slides', $slides);
        });

        view()->composer('cruise.includes._header', function ($view) {
            $view->with('yachts', Yacht::all());
        });

        view()->composer('cruise.packages', function ($view) {
            $banner_purpose_id = \App\Models\MediaFilePurpose::where('name', 'banner')->get()->pluck('id')->first();
            $banner = $banner_purpose_id ? \App\Models\MediaFile::where('purpose', $banner_purpose_id) : null;
            $view->with('yachts', Yacht::all())->with('banner', $banner);
        });

        // view()->composer('cruise.package', function ($view) {
        //     $slide_purpose_id = \App\Models\MediaFilePurpose::where('name', 'slide')->get()->pluck('id')->first();
        //     $slides = $slide_purpose_id ? \App\Models\MediaFile::where('purpose', $slide_purpose_id) : null;
        //     $banner_purpose_id = \App\Models\MediaFilePurpose::where('name', 'banner')->get()->pluck('id')->first();
        //     $banner = $banner_purpose_id ? \App\Models\MediaFile::where('purpose', $banner_purpose_id) : null;
        //     $view->with('slides', $slides)->with('banner', $banner);
        //     // $view->with('banner', $banner);
        // });
    }
}
