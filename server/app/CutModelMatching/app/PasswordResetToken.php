<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{

    const TOKEN_MAX_LENGTH = 60;
}
