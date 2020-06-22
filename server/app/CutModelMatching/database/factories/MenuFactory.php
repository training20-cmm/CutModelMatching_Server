<?php

use App\Menu;
use App\Hairdresser;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        "title" => $faker->text(32),
        "details" => $faker->paragraph,
        "gender" => ["男", "女"][$faker->numberBetween(0, 1)],
        "price" => $faker->numberBetween(1500, 3000),
        "minutes" => $faker->numberBetween(30, 360),
        "hairdresser_id" => Hairdresser::inRandomOrder()->first()->id
    ];
});
