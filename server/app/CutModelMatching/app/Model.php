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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'identifier', 'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function refreshToken(): ?ModelRefreshToken
    {
        return $this->refreshTokens()->orderBy("id", "desc")->first();
    }

    public function refreshTokens(): HasMany
    {
        return $this->hasMany(ModelRefreshToken::class);
    }
}
