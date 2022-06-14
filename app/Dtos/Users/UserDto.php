<?php

namespace App\Dtos\Users;

use Illuminate\Http\Resources\Json\JsonResource;

class UserDto extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}
