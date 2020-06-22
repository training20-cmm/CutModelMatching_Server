<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuTreatment extends Model
{
    const NAME_MAX_LENGTH = 32;

    public static function table(): string
    {
        return "menu_treatment";
    }

    protected $table = "menu_treatment";

    protected $fillable = ["name"];
}
