<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInShoppingCart extends Model
{
    protected $fillable = ["shopping_cart_id", "product_id"];

    public function shopping_cart()
    {
        return $this->belongsTo('App\ShoppingCart');
    }

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
