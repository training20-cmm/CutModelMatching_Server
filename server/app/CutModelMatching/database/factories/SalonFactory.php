<?php

use App\Salon;
use Faker\Generator as Faker;

$factory->define(Salon::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "postcode" => $faker->postcode,
        "prefecture" => $faker->prefecture(),
        "address" => $faker->address,
        "building" => "コラム南青山 5F",
        "bio_text" => $faker->text,
        "capacity" => rand(1, 100),
        "parking" => rand(1, 1000),
        "open_hours_weekdays" => 10,
        "close_hours_weekdays" => 19,
        "open_hours_weekends" => 8,
        "close_hours_weekends" => 17,
        "regular_holiday" => ["月", "火", "水", "木", "金", "土", "日"][rand(0, 6)],
    ];
});
