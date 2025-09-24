<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View; 

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }

    
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $cartCount = 0;
            foreach($cart as $item) {
                $cartCount += $item['quantity'];
            }
            $view->with('cartCount', $cartCount);
        });
    }
}
