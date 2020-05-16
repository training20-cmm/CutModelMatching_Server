<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salon extends Model
{

    const POSTCODE_MAX_LENGTH = 7;
    const PREFECTURE_MAX_LENGTH = 3;
    const ADDRESS_MAX_LENGTH = 255;
    const BUILDING_MAX_LENGTH = 255;
    const BIO_TEXT_MAX_LENGTH = 2056;
    const PROFILE_IMAGE_PATH_MAX_LENGTH = 1023;
    const HEADER_IMAGE_PATH_MAX_LENGTH = 1023;

    protected $fillable = [
        "postcode",
        "prefecture",
        "address",
        "building",
        "bio_text",
        "profile_image_path",
        "header_image_path"
    ];
}
