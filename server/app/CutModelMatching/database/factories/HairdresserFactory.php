<?php

use App\Hairdresser;
use Faker\Generator as Faker;

$factory->define(Hairdresser::class, function (Faker $faker) {
    return [
        "identifier" => $faker->uuid,
        "password" => $faker->password(60, 60),
        "name" => $faker->name,
        "email" => $faker->email,
        "bio_text" => $faker->text,
        "salon_id" => rand(1, 100),
    ];
});
