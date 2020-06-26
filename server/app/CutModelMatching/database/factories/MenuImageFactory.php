<?php

use App\Menu;
use App\MenuImage;
use Faker\Generator as Faker;

$factory->define(MenuImage::class, function (Faker $faker) {
    return [
        "path" => "/storage/seed/dummy1.png",
        "menu_id" => Menu::inRandomOrder()->first()->id
    ];
});
