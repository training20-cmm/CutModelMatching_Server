<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const IDENTIFIER_MAX_LENGTH = 64;
    const PASSWORD_MAX_LENGTH = 60;
    const EMAIL_MAX_LENGTH = 255;

    protected $fillable = ["identifier", "password"];

    protected $hidden = ["password"];

    public function refreshToken(): ?RefreshToken
    {
        return $this->hasMany(RefreshToken::class)->orderBy("id", "desc")->first();
    }
}
