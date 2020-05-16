<?php

namespace App\Http\Responses;

use App\Hairdresser;

class HairdresserResponse extends Response
{

    public $name;
    public $identifier;

    public function __construct(Hairdresser $hairdresser)
    {
        $this->name = $hairdresser->name;
        $this->identifier = $hairdresser->identifier;
    }
}
