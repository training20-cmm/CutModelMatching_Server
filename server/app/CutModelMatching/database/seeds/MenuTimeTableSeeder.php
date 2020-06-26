<?php

use App\Menu;
use App\MenuTime;
use Illuminate\Database\Seeder;

class MenuTimeTableSeeder extends Seeder
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
            factory(MenuTime::class, 30)->create(["menu_id" => $menu->id]);
        }
    }
}
