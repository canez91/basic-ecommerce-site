<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductsCollection;
use Facades\App\Validate;
use Facades\App\HandlerMedia;

class ProductsController extends Controller
{
    public $response;

    public function __construct(){
        $this->middleware("auth");
        $response = [
          'msg' => ''
        ];

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("products.index", [ 'products' => $products, 'title' => "Lista de productos"] );
    }

    public function getProductList(Request $request)
    {
        $products = Product::where("status", 1)->all();
        return new ProductsCollection($products); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product;
        return view("products.create", [ 'product' => $product, 'title' => "Nuevo producto"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $response = ["msg"=>""];

       $arrayRequired = [
         "sku" => "SKU",
         "title" => "Título",
         "description" => "Descripción",
         "price" => "Precio sin descuento",
         "price2" => "Precio con descuento",
         "image_url" => "Imagen", 
       ];

       $requiredFields = Validate::setRequiredFieldsArray( $request, $arrayRequired );
       $resp = Validate::validateRequiredFields( $requiredFields );

       if( $resp !== "" ){
         $response["msg"] = "El campo ".$resp." es obligatorio.";
         return response()->json($response, 404);
       }

        $arrayCheck = array( 
          $request->sku,
          $request->title,
          $request->description,
        );

        $resp = Validate::checkCaracters( $arrayCheck, '/[*\-+_\/¡!^{}¿?()\|\[\]#$%°¬~&="]+/' );

        if( $resp["status"] ){
          $response["msg"] = $resp["msg"];
          return response()->json($response, 404);
        } 

       $empty_media_name = HandlerMedia::strimMediaName( $request->image_url );

        $data = [
          "sku" => $request->sku,
          "title" => $request->title,
          "description" => $request->description,
          "price" => $request->price,
          "price2" => $request->price2,
          "status" => \Request::exists('status')?$request->status:0,
          "image_url" => $empty_media_name,
        ];

       if( Product::create($data) ){
         if( HandlerMedia::fileExists("tmp", $empty_media_name) ){
           HandlerMedia::moveMedia($empty_media_name, "tmp", "images");     
           $response["msg"] = "La operación se realizó con éxito.";
           return response()->json($response, 200);
         }
       }else{
         return view("products.create");
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view("products.show", [ 'product' => $product , 'title' => $product->title]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product  = Product::find($id);
        return view("products.edit", [ 'product' => $product , 'title' => $product->title ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $response = ["msg"=>""];

        $arrayRequired = [
         "sku" => "SKU",
         "title" => "Título",
         "description" => "Descripción",
         "price" => "Precio sin descuento",
         "price2" => "Precio con descuento",
         "image_url" => "Imagen", 
       ];

       $requiredFields = Validate::setRequiredFieldsArray( $request, $arrayRequired );
       $resp = Validate::validateRequiredFields( $requiredFields );

       $product = Product::find($id);

       if( $resp !== "" ){
         $response["msg"] = "El campo ".$resp." es obligatorio.";
         return response()->json($response, 404);
       }

        $arrayCheck = array( 
          $request->sku,
          $request->title,
          $request->description,
        );

        $resp = Validate::checkCaracters( $arrayCheck, '/[*\-+_\/¡!^{}¿?()\|\[\]#$%°¬~&="]+/' );

        if( $resp["status"] ){
          $response["msg"] = $resp["msg"];
          return response()->json($response, 404);
        } 

        if( boolval ( $request->new_image ) && mb_strlen( $request->image_url ) < 1 ){
          $response["msg"] = "No has elegido una nueva imagen.";
          return response()->json($response, 404);
        } else {
            $empty_media_name = HandlerMedia::strimMediaName( $request->image_url );

            if( HandlerMedia::fileExists("tmp", $empty_media_name) ){
              HandlerMedia::moveMedia($empty_media_name, "tmp", "images"); 
              $product->image_url = $request->image_url;    
            }
        }

        $product->sku = $request->sku;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->price2 = $request->price2;
        $product->status = is_null($request->status)?0:$request->status;
        $product->description = $request->description;

        if($product->save()){
            $response["msg"] = "La operación se realizó con éxito.";
            return response()->json($response, 200);
        }else{
            return view("products.edit", [ 'product' => $product]);
        }
    }

    private function setSessionWithData($variable, $msg){
        \Session::flash($variable, $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return redirect("/products");
    }
}
