<?php

use App\Menu;
use App\MenuImage;
use Illuminate\Database\Seeder;

class MenuImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = Menu::all()->all();
        foreach($menus as $menu) {
            factory(MenuImage::class, [
                "menu_id" => $menu->id
            ])->create();
        }
    }
}
