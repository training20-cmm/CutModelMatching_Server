<?php

use App\Menu;
use App\MenuTime;
use Faker\Generator as Faker;

$factory->define(MenuTime::class, function (Faker $faker) {
    return [
        "date" => $faker->date(),
        "start" => $faker->numberBetween(0, 23),
        "menu_id" => Menu::inRandomOrder()->first()->id
    ];
});
