<?php

use App\HairdresserPosition;
use Illuminate\Database\Seeder;

class HairdresserPositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HairdresserPosition::create(["name" => "stylist"]);
        HairdresserPosition::create(["name" => "assistant"]);
    }
}
