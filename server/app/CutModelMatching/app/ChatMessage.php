<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    const CONTENT_MAX_LENGTH = 255;
    const IMAGE_PATH_MAX_LENGTH = 1023;
}
