<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function process(string $message, $func)
    {
        Log::info($message);
        $result = $this->send($func);
        Log::info($result->message);
        return $result;
    }

    public static function send($query)
    {
        return event($query)[0];
    }
}
