<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\CategoryResource;
use App\Http\Resources\FileResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

class ProductCollection extends ResourceCollection
{

    public $collects = ProductResource::class;

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

