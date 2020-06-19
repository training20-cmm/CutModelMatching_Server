<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTime extends Model
{

    public static function table(): string {
        return "menu_time";
    }

    protected $fillable = ["start", "menu_id"];
}
