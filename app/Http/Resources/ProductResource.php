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
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "category" => CategoryResource::make($this->whenLoaded("category")),
            "title" => $this->title,
            "price" => $this->price,
            "sale_price" => $this->sale_price,
            "description" => $this->description,
            "rating" => $this->rating,
            "is_active" => $this->is_active,
            "created_at" => $this->created_at->diffForHumans(),
        ];
    }
}
