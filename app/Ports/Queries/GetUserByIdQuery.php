<?php

namespace App\Ports\Queries;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GetUserByIdQuery
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $id;
    public function __construct($id)
    {
        $this->id = $id;
    }
}
