<?php

namespace App\Http\Responses;

use App\Menu;

class MenuResponse extends Response
{

    public $id;
    public $title;
    public $details;
    public $gender;
    public $price;
    public $minutes;
    public $hairdresserId;

    public $hairdresser;
    public $tags;
    public $images;
    public $treatment;
    public $time;

    public function constructWith(Menu $menu)
    {
        $this->id = $menu->id;
        $this->title = $menu->title;
        $this->details = $menu->details;
        $this->gender = $menu->gender;
        $this->price = $menu->price;
        $this->minutes = $menu->minutes;
        $this->hairdresserId = $menu->hairdresserId;
    }
}
