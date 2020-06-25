<?php

use App\Menu;
use App\MenuTag;
use Illuminate\Database\Seeder;

class MenuTagAssociationTableSeeder extends Seeder
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
            $menuTags = MenuTag::inRandomOrder()->get()->all();
            $count = rand(0, count($menuTags) - 1);
            for ($index = 0; $index < $count; ++$index) {
                $menu->tags()->attach($menuTags[$index]->id);
            }
        }
    }
}
