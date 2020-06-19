<?php

namespace App\Http\Response;

use App\Menu;

class MenuResponse extends Response {

    //  "title",
    //     "details",
    //     "gender",
    //     "price",
    //     "minutes",
    //     "hairdresser_id"
    public $id;
    public $title;
    public $details;
    public $gender;
    public $minutes;
    public $hairdresserId;

    public $tags;
    public $images;
    public $treatment;

    public function constructWith(Menu $menu) {
        $this->id = $menu->id;
        $this->title = $menu->title;
        $this->details = $menu->details;
        $this->gender = $menu->gender;
        $this->minutes = $menu->minutes;
        $this->hairdresserId = $menu->hairdresserId;
    }
}
