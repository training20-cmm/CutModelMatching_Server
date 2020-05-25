<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    const TITLE_MAX_LENGTH = 255;
    const CONTENT_MEX_LENGTH = 2048;
}
