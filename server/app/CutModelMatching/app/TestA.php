<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestA extends Model
{

    protected $table = "test_a";

    public function testBs(): HasMany
    {
        return $this->hasMany(TestB::class, "a_id");
    }

    public function testA1s(): HasMany
    {
        return $this->hasMany(TestA1::class, "a_id");
    }
}
