<?php

use App\UserType;
use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create(["name" => UserType::NAME_MODEL]);
        UserType::create(["name" => UserType::NAME_HAIRDRESSER]);
    }
}
