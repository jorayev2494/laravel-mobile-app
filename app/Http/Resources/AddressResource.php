<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "city" => $this->city,
            "address_street" => $this->address_street,
            "address_lane" => $this->address_lane,
            "postal_code" => $this->postal_code,
            "phone_number" => $this->phone_number,
            "author" => UserResource::make($this->whenLoaded("author")),

        ];
    }
}
