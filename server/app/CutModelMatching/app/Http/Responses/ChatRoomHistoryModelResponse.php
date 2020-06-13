<?php

namespace App\Http\Responses;

use App\Model;

class ChatRoomHistoryModelResponse extends ChatRoomHistoryResponse
{

    public $model;

    public function fillWith(Model $model)
    {
        $this->model = $model;
    }
}
