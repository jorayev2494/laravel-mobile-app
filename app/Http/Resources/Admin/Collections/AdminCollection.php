<?php

namespace App\Http\Resources\Admin\Collections;

use App\Http\Resources\Admin\AdminResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection
{

    public $collects = AdminResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): mixed
    {
        return $this->resource;
    }
}
