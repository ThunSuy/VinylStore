<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cartCount = 0;

            if (Auth::check()) {
                // Lấy số lượng từ DB
                $userId = Auth::id();
                $cartCount = DB::table('cart')
                    ->where('user_id', $userId)
                    ->count();
            } else {
                // Lấy từ cookie
                $cart = json_decode(Cookie::get('cart'), true);
                $cartCount = is_array($cart) ? count($cart) : 0;
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
