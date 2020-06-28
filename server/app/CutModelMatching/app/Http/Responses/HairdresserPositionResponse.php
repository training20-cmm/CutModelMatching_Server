<?php

namespace App\Http\Responses;

use App\HairdresserPosition;

class HairdresserPositionResponse extends Response
{

    public $id;
    public $name;
    public $createdAt;
    public $updatedAt;

    public function constructWith(HairdresserPosition $position)
    {
        $this->id = $position->id;
        $this->name = $position->name;
        $this->createdAt = $position->created_at->toDateTimeString();
        $this->updatedAt = $position->updated_at->toDateTimeString();
    }
}
