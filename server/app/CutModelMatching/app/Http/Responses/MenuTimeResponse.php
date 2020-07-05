<?php

namespace App\Http\Responses;

use App\MenuTime;

class MenuTimeResponse extends Response
{

    public $id;
    public $date;
    public $start;
    public $menuId;
    public $createdAt;
    public $updatedAt;

    public function constructWith(MenuTime $menuTime)
    {
        $this->id = $menuTime->id;
        $this->date = $menuTime->date;
        $this->start = $menuTime->start;
        $this->menuId = $menuTime->menu_id;
        $this->createdAt = is_null($menuTime->created_at) ? null : $menuTime->created_at->toDateTimeString();
        $this->updatedAt = is_null($menuTime->updated_at) ? null : $menuTime->updated_at->toDateTimeString();
    }
}
