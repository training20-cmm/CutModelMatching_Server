<?php

use App\Hairdresser;
use App\Model;
use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        "content" => $faker->sentence(),
        "skill" => $faker->numberBetween(1, 5),
        "customer_service" => $faker->numberBetween(1, 5),
        "salon_service" => $faker->numberBetween(1, 5),
        "app" => $faker->numberBetween(1, 5),
        "model_id" => Model::inRandomOrder()->first()->id,
        "hairdresser_id" => Hairdresser::inRandomOrder()->first()->id,
    ];
});
