<?php

namespace App\Providers;

use App\Models\Wishlist;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
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

        // method to show wishlist Counter in layouts.app blade
        view()->composer('layouts.app', function ($view) {
            $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
            $view->with('wishlistCount', $wishlistCount);
        });

        Schema::defaultStringLength(191);
        // method to use bootstrap paginate
        Paginator::useBootstrap();
    }
}
