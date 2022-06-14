<?php

namespace App\Dtos\Users;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserListDto extends ResourceCollection
{
    public function toArray($request)
    {
        return $this->collection->map(function ($e) {
            return new UserDto($e);
        });
    }
}
