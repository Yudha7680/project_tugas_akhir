<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockOut;
use Faker\Generator as Faker;

$factory->define(StockOut::class, function (Faker $faker) {

    return [
        'item_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'date_out' => $faker->word,
        'total' => $faker->randomDigitNotNull,
        'location' => $faker->text,
        'description' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
