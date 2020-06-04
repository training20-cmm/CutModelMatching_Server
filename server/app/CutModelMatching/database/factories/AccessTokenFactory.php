<?php

use App\AccessToken;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(AccessToken::class, function (Faker $faker) {
    return [
        "token" => str_random(AccessToken::TOKEN_MAX_LENGTH),
        "expiration" => Carbon::now()->addMonths(6),
        "user_id" => function () {
            return User::inRandomOrder()->first()->id;
        }
    ];
});
