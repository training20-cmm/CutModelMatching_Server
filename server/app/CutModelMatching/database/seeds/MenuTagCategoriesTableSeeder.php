<?php

use App\MenuTagCategory;
use Illuminate\Database\Seeder;

class MenuTagCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["性別", 0],
            ["施術内容", 1],
        ];
        foreach($categories as $category) {
            MenuTagCategory::create([
                "name" => $category[0],
                "index" => $category[1],
            ]);
        }
    }
}
