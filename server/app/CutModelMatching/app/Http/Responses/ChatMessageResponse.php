<?php

namespace App\Http\Responses;

use App\ChatMessage;

class ChatMessageResponse extends Response
{

    public $id;
    public $content;
    public $imagePath;
    public $chatRoomId;
    public $userId;
    public $createdAt;
    public $updatedAt;

    public function constructWith(ChatMessage $chatMessage)
    {
        $this->id = $chatMessage->id;
        $this->content = $chatMessage->content;
        $this->imagePath = $chatMessage->imagePath;
        $this->chatRoomId = $chatMessage->chat_room_id;
        $this->userId = $chatMessage->user_id;
        $this->createdAt = $chatMessage->created_at->toDateTimeString();
        $this->updatedAt = $chatMessage->updated_at->toDateTimeString();
    }
}
