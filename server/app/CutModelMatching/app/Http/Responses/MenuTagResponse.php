<?php

namespace App\Http\Responses;

use App\MenuTag;

class MenuTagResponse extends Response
{

    public $id;
    public $name;
    public $color;
    public $categoryId;

    public function constructWith(MenuTag $menuTag)
    {
        $this->id = $menuTag->id;
        $this->name = $menuTag->name;
        $this->color = $menuTag->color;
        $this->categoryId = $menuTag->categoryId;
    }
}
