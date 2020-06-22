<?php

use App\MenuTag;
use Illuminate\Database\Seeder;

class MenuTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            ["メンズ", "80deea", 1],
            ["レディース", "80cbc4", 1],
            ["カット", "80cbc4", 2],
            ["カラー", "a5d6a7", 2],
        ];
        foreach($tags as $tag) {
            MenuTag::create([
                "name" => $tag[0],
                "color" => $tag[1],
                "category_id" => $tag[2]
            ]);
        }
    }
}
