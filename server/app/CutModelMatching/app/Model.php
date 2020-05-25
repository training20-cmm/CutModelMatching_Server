<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Model extends Authenticatable
{
    use Notifiable;

    const IDENTIFIER_MAX_LENGTH = 64;
    const NAME_MAX_LENGTH = 64;
    const PASSWORD_MIN_LENGTH = 6;
    const PASSWORD_MAX_LENGTH = 60;
    const EMAIL_MAX_LENGTH = 255;
    const GENDER_LENGTH = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name"
    ];
}
