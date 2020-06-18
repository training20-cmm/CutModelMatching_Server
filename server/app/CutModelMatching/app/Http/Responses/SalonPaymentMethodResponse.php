<?php

namespace App\Http\Responses;

use App\SalonPaymentMethod;

class SalonPaymentMethodResponse extends Response
{
    public $id;
    public $name;
    public $createdAt;
    public $updatedAt;

    public function constructWith(SalonPaymentMethod $salonPaymentMethod)
    {
        $this->id = $salonPaymentMethod->id;
        $this->name = $salonPaymentMethod->name;
        $this->createdAt = $salonPaymentMethod->created_at->toDateString();
        $this->updatedAt = $salonPaymentMethod->updated_at->toDateString();
    }
}
