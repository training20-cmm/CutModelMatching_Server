<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Model extends Authenticatable
{
    use Notifiable;

    const IDENTIFIER_MAX_LENGTH = 64;
    const NAME_MAX_LENGTH = 64;
    const BIO_TEXT_MAX_LENGTH = 2056;
    const PASSWORD_MIN_LENGTH = 6;
    const PASSWORD_MAX_LENGTH = 60;
    const GENDER_LENGTH = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "bio_text",
        "gender",
        "birthday",
        "user_id"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
