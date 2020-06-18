<?php

use App\Salon;
use App\SalonImage;
use Illuminate\Database\Seeder;

class SalonImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $files = ["dummy1.png", "dummy2.png", "dummy3.png"];
        $salons = Salon::all()->all();
        foreach ($salons as $salon) {
            foreach ($files as $file) {
                $path = "storage/seed/";
                SalonImage::create(["path" => "$path/$file", "salon_id" => $salon->id]);
            }
        }
    }
}
