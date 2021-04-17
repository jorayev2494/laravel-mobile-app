<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            "quantity_orders" => $this->quantity_orders,
            "sum" => $this->sum,
            "status" => $this->status,
            "orders_count" => $this->when($this->orders_count, $this->orders_count),
            "author" => UserResource::make($this->whenLoaded("author")),
            "address" => AddressResource::make($this->whenLoaded("address")),
            "orders" => OrderResource::collection($this->whenLoaded("orders")),
            "created_at" => $this->created_at->diffForHumans()
        ];
    }
}
