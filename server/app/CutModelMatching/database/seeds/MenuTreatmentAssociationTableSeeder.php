<?php

use App\Menu;
use App\MenuTreatment;
use Illuminate\Database\Seeder;

class MenuTreatmentAssociationTableSeeder extends Seeder
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
            $menuTreatmentList = MenuTreatment::inRandomOrder()->get()->all();
            $count = rand(0, count($menuTreatmentList) - 1);
            for ($index = 0; $index < $count; ++$index) {
                $menu->treatment()->attach($menuTreatmentList[$index]->id);
            }
        }
    }
}
