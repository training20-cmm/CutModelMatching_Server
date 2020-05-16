<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hairdresser extends Model
{

    const IDENTIFIER_MAX_LENGTH = 64;
    const NAME_MAX_LENGTH = 64;
    const PASSWORD_MIN_LENGTH = 6;
    const PASSWORD_MAX_LENGTH = 60;
    const BIO_TEXT_MAX_LENGTH = 2056;
    const PROFILE_IMAGE_PATH_MAX_LENGTH = 1023;
    const HEADER_IMAGE_PATH_MAX_LENGTH = 1023;

    protected $fillable = [
        'identifier', 'name', 'password',
    ];

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class);
    }
}
