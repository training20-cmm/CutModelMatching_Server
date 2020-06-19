<?php

namespace App\Http\Responses;

use App\Hairdresser;

class HairdresserResponse extends Response
{

    public $name;
    public $identifier;
    public $user;

    public function constructWith(Hairdresser $hairdresser)
    {
        $this->name = $hairdresser->name;
        $this->identifier = $hairdresser->identifier;
        $this->user = $hairdresser->user;
    }
}
