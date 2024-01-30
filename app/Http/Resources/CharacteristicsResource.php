<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CharacteristicsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'bedrooms' =>$this->bedrooms,
            'bathrooms' =>$this->bathrooms,
            'sqft' =>$this->sqft,
            'price' =>$this->price,
            'price_sqft' =>$this->price_sqft,
            'property_category' =>$this->property_category,
            'status' =>$this->status,
        ];
    }
}
