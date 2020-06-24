<?php

namespace App\Http\Responses;

use App\MenuTreatment;

class MenuTreatmentResponse extends Response
{

    public $id;
    public $name;
    public $createdAt;
    public $updatedAt;

    public function constructWith(MenuTreatment $menuTreatment)
    {
        $this->id = $menuTreatment->id;
        $this->name = $menuTreatment->name;
        $this->createdAt = $menuTreatment->createdAt;
        $this->updatedAt = $menuTreatment->updatedAt;
    }
}
