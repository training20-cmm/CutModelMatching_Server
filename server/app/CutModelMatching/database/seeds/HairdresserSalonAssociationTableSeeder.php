<?php

use App\Hairdresser;
use App\Salon;
use Illuminate\Database\Seeder;

class HairdresserSalonAssociationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hairdressers = Hairdresser::all()->all();
        $salons = Salon::all()->all();
        $salonIndex = 0;
        foreach ($hairdressers as $hairdresser) {
            $salon = $salons[$salonIndex];
        }
    }
}
