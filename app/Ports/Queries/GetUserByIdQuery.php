<?php

namespace App\Ports\Queries;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class GetUserByIdQuery
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}
