<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    const NAME_MAX_LENGTH = 32;

    const NAME_MODEL = "model";
    const NAME_HAIRDRESSER = "hairdresser";

    public static function model(): UserType
    {
        return UserType::where("name", self::NAME_MODEL)->get()->first();
    }

    public static function hairdresser(): UserType
    {
        return UserType::where("name", self::NAME_HAIRDRESSER)->get()->first();
    }
}
