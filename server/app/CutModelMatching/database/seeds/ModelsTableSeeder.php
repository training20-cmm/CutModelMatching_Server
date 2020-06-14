<?php

use App\Model;
use App\User;
use App\UserType;
use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userType = UserType::where("name", UserType::NAME_MODEL)->get()->first();
        for ($i = 0; $i < 10; ++$i) {
            $user = factory(User::class)->make([
                "type_id" => $userType->id
            ]);
            $user->save();
            factory(Model::class)->create([
                "user_id" => $user->id,
            ]);
        }
    }
}
