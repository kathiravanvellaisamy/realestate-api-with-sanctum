<?php

namespace App\Http\Resources;

use App\Models\Broker;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertiesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $broker = Broker::find($this->broker_id);
        return [
            'id' => (string) $this->id,
            'attributes' => [
                'property_type' => $this->property_type,
                'address' => $this->address,
                'city' => $this->city,
                'zip_code' => $this->zzip_code,
                'description' => $this->description,
                'build_year' => $this->build_year,
            ],

            'characteristics' => [
                new CharacteristicsResource($this->characteristic)
            ],

            'broker' => [
                'name' => $broker->name,
                'address' => $broker->address,
                'phone_number' => $broker->phone_number
            ]
        ];
    }
}
