<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'avatar' => $this->avatar_url,
            'phone' => $this->phone,
            'email_verified_at' => $this->email_verified_at?->diffForHumans(),
            'email_confirmed' => $this->email_confirmed?->diffForHumans(),
            'is_blocked' => $this->is_blocked,
            'last_login' => $this->last_login,
            'last_login' => $this->last_login?->diffForHumans(),
            'last_activity' => $this->last_activity?->diffForHumans(),
            'created_at' => $this->created_at?->diffForHumans(),
        ];
    }
}
