<?php

use App\SalonPaymentMethod;
use Illuminate\Database\Seeder;

class SalonPaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SalonPaymentMethod::create(["name" => "現金"]);
        SalonPaymentMethod::create(["name" => "クレジットカード"]);
    }
}
