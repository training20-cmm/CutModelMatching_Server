<?php

use App\Menu;
use App\Reservation;
use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all()->all();
        foreach ($menus as $menu) {
            $menuTime = $menu->time()->first();
            factory(Reservation::class)->create(["menu_id" => $menu->id, "menu_time_id" => $menuTime->id]);
        }
    }
}
