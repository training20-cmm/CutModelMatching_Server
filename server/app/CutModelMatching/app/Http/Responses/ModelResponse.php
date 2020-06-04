<?php

namespace App\Http\Responses;

use App\Model;

class ModelResponse extends Response
{

    public $name;
    public $identifier;
    public $user;

    public function constructWith(Model $model)
    {
        $this->name = $model->name;
        $this->identifier = $model->identifier;
        $this->user = $model->user;
    }
}
