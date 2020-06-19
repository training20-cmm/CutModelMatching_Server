<?php

namespace App;

use App\MenuTag;
use App\MenuTreatment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{

    const TITLE_MAX_LENGTH = 128;
    const DETAILS_MAX_LENGTH = 2048;
    const GENDER_LENGTH = 1;

    protected $fillable = [
        "title",
        "details",
        "gender",
        "price",
        "minutes",
        "hairdresser_id"
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(MenuTag::class, "menu_tag_association");
    }

    public function treatment(): BelongsToMany
    {
        return $this->belongsToMany(MenuTreatment::class, "menu_treatment_association");
    }

    public function images(): HasMany
    {
        return $this->hasMany(MenuImage::class);
    }
}
