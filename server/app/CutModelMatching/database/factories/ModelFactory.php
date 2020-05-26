<?php

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "bio_text" => $faker->paragraph(),
        "gender" => ["男", "女"][rand(0, 1)],
        "birthday" => $faker->date(),
        "user_id" => rand(1, 100)
    ];
});
