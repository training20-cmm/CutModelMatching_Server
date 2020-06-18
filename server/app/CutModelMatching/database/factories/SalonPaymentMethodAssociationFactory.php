<?php

use App\Salon;
use App\SalonPaymentMethod;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        "salon_id" => Salon::inRandomOrder()->first()->id,
        "salon_payment_method_id" => SalonPaymentMethod::inRandomOrder()->first()->id,
    ];
});
