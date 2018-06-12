<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductsCollection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newProducts = $this->getHomeProducts();
        return view("shop", [ 'newProducts' =>  $newProducts ]);
    }

    public function contact()
    {
        return view("contact");
    }

    public function about()
    {
        return view("about");
    }

    public function products()
    {
        return view("products");
    }

    public function getProductList(Request $request)
    {
        $products = Product::where("status", 1)->get();
        return new ProductsCollection($products); 
    }

    public function productDetail($sku)
    {
        $product = Product::where("sku", $sku)->first();

        if( !is_null( $product ) ){
            return view("detail", [ 'product' => $product]);
        } else {
            $newProducts = $this->getHomeProducts();
            return redirect()->route('shop.home', ['newProducts' => $newProducts]);
        }

    }

    private function getHomeProducts(){
        $newProducts = Product::where("status", 1)->get()->sortByDesc('created_at')->take(4);
        $collection = new ProductsCollection($newProducts);
        $collection = $collection->toArray($newProducts)["data"];

        return $collection->all();
    }
}
