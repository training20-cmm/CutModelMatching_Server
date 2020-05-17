<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestC extends Model
{

    protected $table = "test_c";

    public function testB(): BelongsTo
    {
        return $this->belongsTo(TestB::class, "b_id");
    }
}
