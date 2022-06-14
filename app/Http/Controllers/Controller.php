<?php

namespace App\Http\Controllers;

use App\Packages\Mediator;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function process(string $message, $func)
    {
        Log::info($message);
        $result = Mediator::send($func);
        Log::info($result->get('message'));
        return $result;
    }
}
