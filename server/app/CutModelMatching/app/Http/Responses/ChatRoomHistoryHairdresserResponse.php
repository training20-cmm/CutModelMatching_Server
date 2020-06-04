<?php

namespace App\Http\Responses;

use App\ChatMessage;
use App\Hairdresser;
use App\Model;

class ChatRoomHistoryHairdresserResponse extends ChatRoomHistoryResponse
{

    public $model;

    public function constructWith(ChatMessage $chatMessage, Model $model)
    {
        $this->chatMessage = new ChatMessageResponse();
        $this->chatMessage->constructWith($chatMessage);
        $this->model = new ModelResponse();
        $this->model->constructWith($model);
    }

    public function fillWith(ChatMessageResponse $chatMessage, ModelResponse $model)
    {
        $this->chatMessage = $chatMessage;
        $this->model = $model;
    }
}
