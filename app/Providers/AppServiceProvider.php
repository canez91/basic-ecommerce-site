<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\ShoppingCart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);
        
        //asignamos el carrito de compra a todas "*" las vistas
        View::composer("*", function($view){
          $sessionName = "shopping_cart_id";
          $shopping_cart_id = \Session::get($sessionName);

          $shopping_cart = ShoppingCart::findOrCreateById($shopping_cart_id);

          //dd($shopping_cart);
          \Session::put($sessionName, $shopping_cart->id);

          $view->with("shopping_cart", $shopping_cart);
        });
    
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
