<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
          "data" => $this->collection->transform( function($element){
            return [
              "id" => $element->id,
              "sku" => $element->sku,
              "title" => $element->title,
              "originalPrice" => "$".($element->price),
              "numberPrice" => $element->price2,
              "humanPrice" => "$".($element->price2),
              "image" => $element->image_url,
              "status" => $element->status,
              "description" => $element->description,
            ];
          })
        ];
    }
    
}
