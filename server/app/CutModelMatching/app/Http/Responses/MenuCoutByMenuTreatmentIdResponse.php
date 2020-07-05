<?php

namespace App\Http\Responses;

class MenuCountByMenuTreatmentIdResponse extends Response
{

    public $menuTreatmentId;
    public $menuTreatmentName;
    public $count;

    public function fillWith(int $menuTreatmentId, string $menuTreatmentName, int $count)
    {
        $this->menuTreatmentId = $menuTreatmentId;
        $this->menuTreatmentName = $menuTreatmentName;
        $this->count = $count;
    }
}
