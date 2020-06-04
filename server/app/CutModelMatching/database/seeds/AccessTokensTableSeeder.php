<?php

use App\AccessToken;
use App\User;
use Illuminate\Database\Seeder;

class AccessTokensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->all();
        foreach ($users as $user) {
            factory(AccessToken::class)->create([
                "user_id" => $user->id
            ]);
        }
    }
}
