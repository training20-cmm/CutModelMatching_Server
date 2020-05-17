<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestA1 extends Model
{
    protected $table = "test_a_1";

    public function testA(): BelongsTo
    {
        return $this->belongsTo(TestA::class, "a_id");
    }
}
