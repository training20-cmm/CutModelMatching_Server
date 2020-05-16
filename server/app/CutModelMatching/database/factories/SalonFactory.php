<?php

use App\Salon;
use Faker\Generator as Faker;

$factory->define(Salon::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "postcode" => str_random(7),
        "prefecture" => "東京",
        "address" => $faker->address,
        "building" => "コラム南青山 5F",
        "bio_text" => $faker->text,
        "profile_image_path" => "images/profile.png",
        "header_image_path" => "images/header.png",
    ];
});
