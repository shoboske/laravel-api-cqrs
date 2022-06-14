<?php

namespace App\Ports\Infrastructure;

class CustomResponse
{
    private bool $error;
    private $data;
    private string $message;
    private function __construct($message, $error, $data = null)
    {
        $this->message = $message;
        $this->error = $error;
        $this->data = $data;

        return $this->toArray();
    }

    public static function Ok($message, $data = null)
    {
        return (new self($message, false, $data))->toArray();
    }

    public static function Fail(string $message)
    {
        return (new self($message, true))->toArray();
    }

    private function toArray()
    {
        $result =  collect([
            'message' => $this->message,
            'error' => $this->error,
        ]);
        if ($this->data != null) {
            $result->put('data', $this->data);
        }
        return $result;
    }
}
