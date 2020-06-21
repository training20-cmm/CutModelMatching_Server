<?php

namespace App\Http\Responses;

class ChatRoomHistoryModelResponse extends ChatRoomHistoryResponse
{

    public $hairdresser;

    public function fillWith(int $id, ChatMessageResponse $chatMessage, HairdresserResponse $hairdresser)
    {
        $this->id = $id;
        $this->chatMessage = $chatMessage;
        $this->hairdresser = $hairdresser;
    }
}
