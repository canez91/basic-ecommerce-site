<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('shop');
});*/
/* SITE ROUTES*/
Route::redirect('/home', '/');
Route::get("/", "HomeController@index")->name("shop.home");
Route::get("/acerca", "HomeController@about");
Route::get("/contacto", "HomeController@contact");
Route::get("/productos","HomeController@products");
Route::get("/productsList", "HomeController@getProductList");
Route::get("/producto/{id}", "HomeController@productDetail");

Route::get('/nestor', function () {
    return view('nestor');
});

/* SITE ROUTES*/

/* CMS ROUTES*/
Route::get("/sadmin/home", "CmsController@homePage");
/* CMS ROUTES*/



//Auth::routes();
// Authentication Routes...
$this->get('/sadmin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/sadmin/login', 'Auth\LoginController@login');
$this->post('/sadmin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('/sadmin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('/sadmin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('/sadmin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
 $this->post('/sadmin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('/sadmin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('/sadmin/password/reset', 'Auth\ResetPasswordController@reset');

Route::get("/carrito", "ShoppingCartController@show")->name("shopping_cart.show");
Route::get("/carrito/productos", "ShoppingCartController@products")->name("shopping_cart.products");
Route::post("/carrito/aumentar", "ProductInShoppingCartsController@plus");
Route::post("/carrito/reducir", "ProductInShoppingCartsController@minus");

Route::get("/pagar", "PaymentsController@pay")->name("payments.pay");
Route::get("/pagar/completar", "PaymentsController@successReturn")->name("payments.successReturn");

Route::resource("/sadmin/products","ProductsController");

//Route::get("/productsList", "ProductsController@getProductList");

Route::resource("in_shopping_carts","ProductInShoppingCartsController"/*,[
  "only" => ["store", "destroy"]
]*/);

Route::post("/upload_media", "HandlerMediaController@upload");

//Route::get('/home', 'HomeController@index')->name('home');
