<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
      "sku",
      "title", 
      "description", 
      "image_url",
      "price",
      "price2", 
      "status",
    ];

    public function url(){
    	return $this->id?"products.update":"products.store";
    }

    public function method(){
    	return $this->id?"PUT":"POST";
    }

    public function products_in_shopping_cart()
    {
        return $this->hasMany('App\ProductInShoppingCart');
    }
}
