<?php

namespace App\Http\Response;

use App\MenuTreatment;

class MenuTreatmentResponse extends Response {

    public $name;

    public function constructWith(MenuTreatment $menuTreatment) {
        $this->name = $menuTreatment->name;
    }
}
