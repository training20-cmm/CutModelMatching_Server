<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalonImage extends Model
{

    public static function table(): string
    {
        return "salon_images";
    }

    protected $fillable = ["path", "salon_id"];
}
