<?php

use App\ChatMessage;
use App\ChatRoom;
use App\User;
use Faker\Generator as Faker;

$factory->define(ChatMessage::class, function (Faker $faker) {
    return [
        "content" => $faker->sentence(),
        "chat_room_id" => function () {
            return ChatRoom::inRandomOrder()->first()->id;
        },
        "user_id" => function () {
            return User::inRandomOrder()->first()->id;
        }
    ];
});
