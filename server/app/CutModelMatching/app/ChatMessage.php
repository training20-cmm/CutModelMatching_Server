<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ChatMessage extends Model
{
    const CONTENT_MAX_LENGTH = 255;
    const IMAGE_PATH_MAX_LENGTH = 1023;

    public function senderUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "sender_user_id");
    }

    public function receiverUser(): BelongsTo
    {
        return $this->belongsTo(User::class, "receiver_user_id");
    }
}
