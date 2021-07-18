<?php

namespace App\Providers;

use App\Http\View\Composers\CategoryyComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Session;
use App\Models\Cart;

class ViewServiceProvider extends ServiceProvider
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
        // Using class based composers...
        // View::composer('profile', ProfileComposer::class);

        // Using closure based composers...
        
        View::composer('frontend.*', function ($view) {
            $currentsession_id = Session::get('cart'); 
            $view->with('categories', Category::where('parent_id','!=','0')->get());
            $view->with('carts', Cart::where('session_id', $currentsession_id )->get());
        });
    }
}