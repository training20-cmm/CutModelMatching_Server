<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{

    protected $fillable = [
        "hairdresser_id", "model_id"
    ];
}
