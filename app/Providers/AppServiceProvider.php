<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->share('siteTitle', 'E-commerce');
        view()->share('siteEmail', 'ecomerce@ecommerce.com');
        view()->share('sitePhone', '+977-9843703429');
        view()->share('siteName', 'E-commerce Test');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
