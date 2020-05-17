<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestB extends Model
{

    protected $table = "test_b";

    public function testA(): BelongsTo
    {
        return $this->belongsTo(TestA::class, "a_id");
    }

    public function testCs(): HasMany
    {
        return $this->hasMany(TestC::class, "b_id");
    }
}
