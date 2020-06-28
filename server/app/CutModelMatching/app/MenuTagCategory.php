<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuTagCategory extends Model
{
    const NAME_MAX_LENGTH = 16;

    protected $fillable = ["name", "index"];

    public function tags(): HasMany
    {
        return $this->hasMany(MenuTag::class, "category_id");
    }
}
