<?php

namespace App\Http\Response;

use App\MenuTag;

class MenuTagResponse extends Response {

    public $name;
    public $color;
    public $categoryId;

    public function constructWith(MenuTag $menuTag) {
        $this->name = $menuTag->name;
        $this->color = $menuTag->color;
        $this->categoryId = $menuTag->categoryId;
    }

}
