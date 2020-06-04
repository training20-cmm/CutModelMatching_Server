<?php

use App\ChatRoom;
use App\Hairdresser;
use App\Model;
use Faker\Generator as Faker;

$factory->define(ChatRoom::class, function (Faker $faker) {
    return [
        "hairdresser_id" => function () {
            return Hairdresser::inRandomOrder()->first()->id;
        },
        "model_id" => function () {
            return Model::inRandomOrder()->first()->id;
        }
    ];
});
