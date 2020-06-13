<?php

use App\Salon;
use Faker\Generator as Faker;

$factory->define(Salon::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "postcode" => str_random(7),
        "prefecture" => $faker->prefecture(),
        "address" => $faker->address,
        "building" => "コラム南青山 5F",
        "bio_text" => $faker->text,
        "capacity" => rand(1, 100),
        "parking" => rand(1, 1000),
    ];
});
