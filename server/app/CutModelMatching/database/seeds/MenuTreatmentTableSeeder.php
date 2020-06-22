<?php

use App\MenuTreatment;
use Illuminate\Database\Seeder;

class MenuTreatmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $treatmentList = [
            ["カット"],
            ["カラー"],
            ["パーマ"],
            ["縮毛矯正"],
            ["エクステ"],
            ["シャンプー"],
            ["トリートメント"],
            ["ヘッドスパ"],
            ["ヘアセット"]
        ];
        $treatmentParameters = array_map(function($treatment) {
            return ["name" => $treatment[0]];
        }, $treatmentList);
        DB::table(MenuTreatment::table())->insert($treatmentParameters);
    }
}
