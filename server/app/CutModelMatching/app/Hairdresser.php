<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hairdresser extends Model
{

    const IDENTIFIER_MAX_LENGTH = 64;
    const NAME_MAX_LENGTH = 64;
    const RUBY_MAX_LENGTH = 255;
    const PASSWORD_MIN_LENGTH = 6;
    const PASSWORD_MAX_LENGTH = 60;
    const BIO_TEXT_MAX_LENGTH = 2056;
    const SPECIALTY_MAX_LENGTH = 512;
    const PROFILE_IMAGE_PATH_MAX_LENGTH = 1023;
    const HEADER_IMAGE_PATH_MAX_LENGTH = 1023;
    const GENDER_LENGTH = 1;

    protected $fillable = [
        "name",
        "bio_text",
        "specialty",
        "profile_image_path",
        "header_image_path",
        "gender",
        "birthday",
        "salon_id",
        "user_id"
    ];

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
