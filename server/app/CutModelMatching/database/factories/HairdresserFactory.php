<?php

use App\Hairdresser;
use App\HairdresserPosition;
use App\Salon;
use App\User;
use Faker\Generator as Faker;

use function PHPSTORM_META\map;

$factory->define(Hairdresser::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "ruby" => "よみ",
        "bio_text" => $faker->text,
        "specialty" => $faker->paragraph(),
        "profile_image_path" => "/dummy/path",
        "gender" => ["男", "女"][rand(0, 1)],
        "birthday" => $faker->date(),
        "years" => rand(0, 30),
        "salon_id" => function () {
            return Salon::inRandomOrder()->first()->id;
        },
        "user_id" => function () {
            return User::inRandomOrder()->first()->id;
        },
        "position_id" => function () {
            return HairdresserPosition::inRandomOrder()->first()->id;
        },
    ];
});
