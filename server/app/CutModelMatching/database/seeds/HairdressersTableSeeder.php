<?php

use App\Hairdresser;
use App\Salon;
use App\User;
use App\UserType;
use Illuminate\Database\Seeder;

class HairdressersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = UserType::where("name", UserType::NAME_HAIRDRESSER)->get()->first();
        for ($i = 0; $i < 10; ++$i) {
            $user = factory(User::class)->make([
                "type_id" => $userType->id
            ]);
            $user->save();
            factory(Hairdresser::class)->create([
                "user_id" => $user->id,
            ]);
        }
    }
}
