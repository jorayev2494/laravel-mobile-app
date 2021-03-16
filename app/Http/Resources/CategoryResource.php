<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            "slug" => $this->slug,
            "image" => $this->image,
            "color" => $this->color,
            "is_active" => $this->is_active,
            "created_at" => $this->created_at->diffForHumans()
        ];
    }
}
