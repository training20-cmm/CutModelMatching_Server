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
        $this->createdAt = $menuTime->created_at->toDateTimeString();
        $this->updatedAt = $menuTime->updated_at->toDateTimeString();
    }
}
