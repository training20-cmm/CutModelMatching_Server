<?php

namespace App\Http\Responses;

class ErrorResponse extends Response
{
    public $code;
    public $message;
    public $description;

    public function __construct(int $code, string $message, string $description)
    {
        $this->code = $code;
        $this->message = $message;
        $this->description = $description;
    }
}
