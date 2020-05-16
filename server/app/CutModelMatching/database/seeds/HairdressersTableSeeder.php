<?php

use App\Hairdresser;
use Illuminate\Database\Seeder;

class HairdressersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hairdresser::class, 100)->create();
    }
}
