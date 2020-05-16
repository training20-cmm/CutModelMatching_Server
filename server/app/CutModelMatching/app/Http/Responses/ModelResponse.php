<?php

namespace App\Http\Responses;

use App\Model;

class ModelResponse extends Response
{

    public $name;
    public $identifier;

    public function __construct(Model $model)
    {
        $this->name = $model->name;
        $this->identifier = $model->identifier;
    }
}
