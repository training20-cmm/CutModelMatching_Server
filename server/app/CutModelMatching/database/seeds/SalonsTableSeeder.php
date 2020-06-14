<?php

use App\Salon;
use Illuminate\Database\Seeder;

class SalonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Salon::class, 10)->create();
    }
}
