<?php

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        "identifier" => $faker->uuid,
        "password" => $faker->password(60, 60),
        "name" => $faker->name,
        "email" => $faker->email
    ];
});
