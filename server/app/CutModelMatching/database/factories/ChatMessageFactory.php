<?php

use App\ChatMessage;
use Faker\Generator as Faker;

$factory->define(ChatMessage::class, function (Faker $faker) {
    return [
        "content" => $faker->sentence(),
        "sender_user_id" => 1,
        "receiver_user_id" => 101
    ];
});
