<?php

namespace App\Http\Responses;

use App\ChatMessage;

class ChatMessageResponse extends Response
{

    public $id;
    public $content;
    public $imagePath;
    public $senderUserId;
    public $receiverUserId;
    public $createdAt;
    public $updatedAt;

    public $senderUser;
    public $receiverUser;

    public function __construct(ChatMessage $chatMessage)
    {
        $this->id = $chatMessage->id;
        $this->content = $chatMessage->content;
        $this->imagePath = $chatMessage->imagePath;
        $this->senderUserId = $chatMessage->sender_user_id;
        $this->receiverUserId = $chatMessage->receiver_user_id;
        $this->createdAt = $chatMessage->created_at;
        $this->updatedAt = $chatMessage->updated_at;

        $this->senderUser = is_null($chatMessage->senderUser) ? null : new UserResponse($chatMessage->senderUser);
        $this->receiverUser = is_null($chatMessage->receiverUser) ? null : new UserResponse($chatMessage->receiverUser);
    }
}
