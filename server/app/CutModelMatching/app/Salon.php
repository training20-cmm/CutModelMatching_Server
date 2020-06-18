<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Salon extends Model
{

    const NAME_MAX_LENGTH = 64;
    const POSTCODE_MAX_LENGTH = 7;
    const PREFECTURE_MAX_LENGTH = 4;
    const ADDRESS_MAX_LENGTH = 255;
    const BUILDING_MAX_LENGTH = 255;
    const BIO_TEXT_MAX_LENGTH = 2056;
    const PROFILE_IMAGE_PATH_MAX_LENGTH = 1023;
    const HEADER_IMAGE_PATH_MAX_LENGTH = 1023;

    protected $fillable = [
        "name",
        "postcode",
        "prefecture",
        "address",
        "building",
        "bio_text",
        "capacity",
        "parking",
        "open_hours_weekdays",
        "close_hours_weekdays",
        "open_hours_weekends",
        "close_hours_weekends",
        "regular_holiday",
    ];

    public function paymentMethods(): BelongsToMany
    {
        return $this->belongsToMany(SalonPaymentMethod::class, "salon_payment_method_association");
    }

    public function images(): HasMany
    {
        return $this->hasMany(SalonImage::class);
    }

    public function hairdressers(): HasMany
    {
        return $this->hasMany(Hairdresser::class);
    }
}
