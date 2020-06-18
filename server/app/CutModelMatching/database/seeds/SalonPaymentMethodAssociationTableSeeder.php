<?php

use App\Salon;
use App\SalonPaymentMethod;
use Illuminate\Database\Seeder;

class SalonPaymentMethodAssociationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $salons = Salon::all()->all();
        $salonPaymentMethods = SalonPaymentMethod::all()->all();
        foreach ($salons as $salon) {
            $count = rand(1, count($salonPaymentMethods));
            for ($index = 0; $index < $count; ++$index) {
                $salonPaymentMethod = $salonPaymentMethods[$index];
                $salon->paymentMethods()->attach($salonPaymentMethod->id);
            }
        }
    }
}
