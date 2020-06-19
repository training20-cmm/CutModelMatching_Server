<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuImage extends Model
{
    const PATH_MAX_LENGTH = 1023;

    public static function table(): string {
        return "menu_images";
    }

    protected $fillable = ["path", "menu_id"];
}
