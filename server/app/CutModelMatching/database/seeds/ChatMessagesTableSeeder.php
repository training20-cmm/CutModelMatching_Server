<?php

use App\ChatMessage;
use App\ChatRoom;
use App\User;
use Illuminate\Database\Seeder;

class ChatMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chatRooms = ChatRoom::with(["hairdresser", "model"])->get()->all();
        foreach ($chatRooms as $chatRoom) {
            factory(ChatMessage::class)->create([
                "chat_room_id" => $chatRoom->id,
                "user_id" => $chatRoom->hairdresser->id,
            ]);
            factory(ChatMessage::class)->create([
                "chat_room_id" => $chatRoom->id,
                "user_id" => $chatRoom->model->id,
            ]);
        }
    }
}
