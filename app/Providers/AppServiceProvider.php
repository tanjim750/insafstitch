<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Services\FacebookConversionService;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('facebook-conversion', function ($app) {
            return new FacebookConversionService();
        });
    }

    public function boot()
    {
        Paginator::useBootstrap();

        View::composer('*', function ($view) {
            $headerCategories = Category::whereNull('parent_id')
                ->with('subcatsRecursive') 
                ->orderBy('name')
                ->get();

            $view->with('headerCategories', $headerCategories);
        });
    }
}
