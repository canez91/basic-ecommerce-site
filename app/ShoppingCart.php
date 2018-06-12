<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    public static function findOrCreateById($shopping_cart_id){
      if ( !is_null( $shopping_cart_id ) ) {
        $cart = ShoppingCart::where("id", $shopping_cart_id)->first();
        if( !is_null( $cart ) ){
          return $cart;
        } else {
          return ShoppingCart::create();
        }
      } else {
        return ShoppingCart::create();
      }	
    }

    public function products(){
    	return $this->belongsToMany("App\Product", "product_in_shopping_carts");
    }
    
    public function products_in_shopping_cart()
    {
        return $this->hasMany('App\ProductInShoppingCart');
    }

    public function productsCount(){
      return $this->products()->count();
    }

    public function amount(){
      //return $this->products()->sum("price");
      $amount = 0;
      foreach ($this->products_in_shopping_cart as $product_in_cart) {
        $amount += $product_in_cart->amount * $product_in_cart->product->price;
      }
      return $amount;
    }

}
