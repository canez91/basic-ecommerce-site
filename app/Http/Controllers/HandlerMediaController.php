<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facades\App\HandlerMedia;

class HandlerMediaController extends Controller
{
    public function upload(Request $request){

      if( HandlerMedia::fileExists("images", $request->image["file_name"]) ){
      	$response = [
          'msg' => 'Ya existe un archivo con el mismo nombre.'
        ];

        return response()->json($response, 404);
      } else {
      	HandlerMedia::saveTempMedia($request->image["file"], $request->image["file_name"], $request->image["format"]);
      }
	}
}
