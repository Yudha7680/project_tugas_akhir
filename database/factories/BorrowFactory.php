<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Borrow;
use Faker\Generator as Faker;

$factory->define(Borrow::class, function (Faker $faker) {

    return [
        'user_id' => $faker->randomDigitNotNull,
        'item_id' => $faker->randomDigitNotNull,
        'total' => $faker->randomDigitNotNull,
        'date_out' => $faker->word,
        'date_in' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
