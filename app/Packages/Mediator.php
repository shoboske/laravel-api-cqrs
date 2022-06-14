<?php

namespace App\Packages;

class Mediator
{
    public static function send($query)
    {
        $result = event($query);

        if (count($result) == 1)
            return $result[0];
    }
}
