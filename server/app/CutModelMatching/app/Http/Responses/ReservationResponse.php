<?php

namespace App\Http\Responses;

use App\Reservation;


class ReservationResponse extends Response
{

    public $id;
    public $menuId;
    public $menuTimeId;
    public $modelId;
    public $createdAt;
    public $updatedAt;

    public $menu;

    public function constructWith(Reservation $reservation)
    {
        $this->id = $reservation->id;
        $this->menuId = $reservation->menu_id;
        $this->menuTimeId = $reservation->menu_time_id;
        $this->modelId = $reservation->model_id;
        $this->createdAt = $reservation->created_at->toDateTimeString();
        $this->updatedAt = $reservation->updated_at->toDateTimeString();
    }
}
