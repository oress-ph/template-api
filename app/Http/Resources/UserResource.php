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
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'name' => $this->name,
            'email' => $this->email,
            'user_type' => $this->user_type,
            'warehouse_id' => $this->warehouse_id,
            'password' => $this->password,
            'is_active' => $this->is_active,
            'user_rights' => new UserRightResource($this->whenLoaded('user_rights')),
            'warehouse' => new UserRightResource($this->whenLoaded('warehouse')),
        ];
    }
}
