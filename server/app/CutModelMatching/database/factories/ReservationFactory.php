<?php

use App\Menu;
use App\Model;
use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    $menu = Menu::inRandomOrder()->first();
    return [
        "menu_id" => $menu->id,
        "menu_time_id" => $menu->time()->first()->id,
        "model_id" => Model::inRandomOrder()->first()->id,
    ];
});
