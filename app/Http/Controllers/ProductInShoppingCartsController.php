<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductInShoppingCart;

class ProductInShoppingCartsController extends Controller
{
    public function __construct(){
    	$this->middleware("shopping_cart");
    }

    public function store(Request $request){
        $done = false;
        $resp = ["action"=>""];

        $previous = ProductInShoppingCart::where("shopping_cart_id", $request->shopping_cart->id)->where("product_id", $request->product_id)->first();

        if( !is_null( $previous ) ){
            $previous->amount = $previous->amount + 1;
            if( $previous->update() ){
              $done = true;
              $resp["action"] = "same";
            }
        } else {
        	$in_shopping_cart = ProductInShoppingCart::create([
        	  "shopping_cart_id" => $request->shopping_cart->id,
        	  "product_id" => $request->product_id	
        	]);

        	if( $in_shopping_cart ){
        	  $done = true;
              $resp["action"] = "new";
        	} 
            
        }

        if( $done ){
          return response()->json($resp, 200);
        } else {
          return response()->json("error", 404);
        }

    }

    public function destroy($id){
      $row = ProductInShoppingCart::find($id);

      if( $row->delete() ){
        return response()->json("ok", 200);
      } else {
        return response()->json("error", 404);
      }
    }

    public function plus(Request $request){
      $row = ProductInShoppingCart::where("id", $request->data1)->where("product_id", $request->data2)->first();

      if( $row ){
        $row->amount = $row->amount + 1;

        if( $row->update() ){
          return response()->json("ok", 200);    
        } else {
          return response()->json("error", 404);
        }
      }
    }

    public function minus(Request $request){
      $row = ProductInShoppingCart::where("id", $request->data1)->where("product_id", $request->data2)->first();

      if( $row && $row->amount > 1){
        $row->amount = $row->amount - 1;

        if( $row->update() ){
            return response()->json("ok", 200);
        } else {
          return response()->json("error", 404);
        }
      }
    }
}
