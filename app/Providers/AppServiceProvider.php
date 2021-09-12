<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Observers\BrandObserve;
use App\Observers\observerCategory;
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
        Category::observe(observerCategory::class);
        Brand::observe(BrandObserve::class);
    }
}
