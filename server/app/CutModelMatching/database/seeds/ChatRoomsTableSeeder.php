<?php

use App\ChatRoom;
use App\Hairdresser;
use App\Model;
use Illuminate\Database\Seeder;

class ChatRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(ChatRoom::class, 100)->create();
        $hairdressers = Hairdresser::all()->all();
        $models = Model::all()->all();
        foreach ($hairdressers as $hairdresser) {
            foreach ($models as $model) {
                factory(ChatRoom::class)->create([
                    "hairdresser_id" => $hairdresser->id,
                    "model_id" => $model->id
                ]);
            }
        }
    }
}
