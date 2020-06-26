<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = "reservation";
    protected $fillable = ["menu_id", "menu_time_id", "model_id"];
}
