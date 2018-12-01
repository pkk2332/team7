<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       
       return [           
            'id' => $this->id,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'price'=>$this->price,
            'image' => $this->media[0]->getFullUrl(),
        ];
    }
}
