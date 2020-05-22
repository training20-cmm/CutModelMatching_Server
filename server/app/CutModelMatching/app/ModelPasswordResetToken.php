<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelPasswordResetToken extends Model
{
    const TOKEN_MAX_LENGTH = 60;
}
