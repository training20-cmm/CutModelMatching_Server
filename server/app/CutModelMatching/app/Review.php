<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    const CONTENT_MAX_LENGTH = 2048;
    const RATING_MAX_VALUE = 5;
}
