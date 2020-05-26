<?php

use App\Salon;
use Faker\Generator as Faker;

// | id         | int(10) unsigned     | NO   | PRI | NULL    | auto_increment |
// | name       | varchar(255)         | NO   |     | NULL    |                |
// | postcode   | varchar(7)           | NO   | UNI | NULL    |                |
// | prefecture | varchar(3)           | NO   |     | NULL    |                |
// | address    | varchar(255)         | NO   |     | NULL    |                |
// | building   | varchar(255)         | NO   |     | NULL    |                |
// | bio_text   | varchar(2056)        | NO   |     | NULL    |                |
// | capacity   | tinyint(3) unsigned  | NO   |     | NULL    |                |
// | parking    | smallint(5) unsigned | NO   |     | NULL    |                |
// | created_at | timestamp            | YES  |     | NULL    |                |
// | updated_at | timestamp            | YES  |     | NULL    |                |

$factory->define(Salon::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "postcode" => str_random(7),
        "prefecture" => "東京",
        "address" => $faker->address,
        "building" => "コラム南青山 5F",
        "bio_text" => $faker->text,
        "capacity" => rand(1, 100),
        "parking" => rand(1, 1000),
    ];
});
