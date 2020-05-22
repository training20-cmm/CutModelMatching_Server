<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hairstyle extends Model
{
    const TITLE_MAX_LENGTH = 128;
    const COMMENT_MAX_LENGTH = 2056;
    const IMAGE_PATH_MAX_LENGTH = 1023;
}
