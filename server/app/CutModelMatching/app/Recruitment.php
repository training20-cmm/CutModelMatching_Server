<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{

    const TITLE_MAX_LENGTH = 128;
    const DETAILS_MAX_LENGTH = 2048;
    const GENDER_LENGTH = 1;
}
