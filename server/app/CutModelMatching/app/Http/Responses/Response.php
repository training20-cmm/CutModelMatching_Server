<?php

namespace App\Http\Responses;

class Response
{
    public function __toString(): string
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }
}
