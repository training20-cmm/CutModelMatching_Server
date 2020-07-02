<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    protected $table = "reservation";
    protected $fillable = ["menu_id", "menu_time_id", "model_id"];

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
