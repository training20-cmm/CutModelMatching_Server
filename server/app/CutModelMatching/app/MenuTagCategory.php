<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTagCategory extends Model
{
    const NAME_MAX_LENGTH = 16;

    protected $fillable = ["name", "index"];
}
