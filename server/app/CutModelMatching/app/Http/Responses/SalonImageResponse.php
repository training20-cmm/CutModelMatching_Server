<?php

namespace App\Http\Responses;

use App\SalonImage;

class SalonImageResponse extends Response
{

    public $id;
    public $name;
    public $createdAt;
    public $updatedAt;

    public function constructWith(SalonImage $salonImage)
    {
        $this->id = $salonImage->id;
        $this->path = $salonImage->path;
        // $this->createdAt = $salonImage->created_at->toDateString();
        // $this->updatedAt = $salonImage->updated_at->toDateString();
    }
}
