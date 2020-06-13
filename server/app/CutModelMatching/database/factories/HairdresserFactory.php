<?php

use App\Hairdresser;
use App\Salon;
use App\User;
use Faker\Generator as Faker;

$factory->define(Hairdresser::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "bio_text" => $faker->text,
        "specialty" => $faker->paragraph(),
        "profile_image_path" => "/dummy/path",
        "header_image_path" => "/dummy/path",
        "gender" => ["男", "女"][rand(0, 1)],
        "birthday" => $faker->date(),
        "salon_id" => function () {
            return Salon::inRandomOrder()->first()->id;
        },
        "user_id" => function () {
            return User::inRandomOrder()->first()->id;
        }
    ];
});
