<?php

namespace App\Http\Responses;

use App\ChatMessage;

class ChatMessageResponse extends Response
{

    public $id;
    public $content;
    public $imagePath;
    public $chatRoomId;
    public $createdAt;
    public $updatedAt;

    public function constructWith(ChatMessage $chatMessage)
    {
        $this->id = $chatMessage->id;
        $this->content = $chatMessage->content;
        $this->imagePath = $chatMessage->imagePath;
        $this->chatRoomId = $chatMessage->chat_room_id;
        $this->createdAt = $chatMessage->created_at->toDateString();
        $this->updatedAt = $chatMessage->updated_at->toDateString();
    }
}
