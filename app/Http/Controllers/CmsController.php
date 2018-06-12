<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('preventBackHistory'); 
        $this->middleware('auth');
    }

    public function homePage()
    {
        //$newProducts = $this->getHomeProducts();
        return view("cms.home"/*, [ 'newProducts' =>  $newProducts ]*/);
    }
}
