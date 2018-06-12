<?php

namespace App;

class Validate
{   
	public function setRequiredFieldsArray($request, $arr){
		$arrResp = [];

		foreach ($arr as $field => $label) {
		  foreach ($request->except("_token") as $key => $value) {
		  	if( $field == $key ){
		  	  $arrResp[$key]["label"] = $label;
		  	  $arrResp[$key]["value"] = $value;
		  	}
		  }
		}

		return $arrResp;
	}

	public function validateRequiredFields($arrFields){

		foreach ($arrFields as $key => $field) {
		  if( is_null( $field["value"] ) ){
		  	return $field["label"];
		  }
		}

		return "";
	}

	public function checkCaracters($values, $regex){
        foreach ($values as $string) {
            $new_string = preg_replace($regex, '', strip_tags( $string ) );
            if ( mb_strlen ( $new_string, "UTF-8" ) < mb_strlen ( $string, "UTF-8" ) ){
              return [
                'status' => true,
                'msg' => "Caracteres inválidos; valida que has ingresado correctamente los campos."
              ];
            }
        }

        return [
          'status' => false,
          'msg' => ""
        ];
    }
}
