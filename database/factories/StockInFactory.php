<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockIn;
use Faker\Generator as Faker;

$factory->define(StockIn::class, function (Faker $faker) {

    return [
        'item_id' => $faker->randomDigitNotNull,
        'supplier_id' => $faker->randomDigitNotNull,
        'created_by' => $faker->randomDigitNotNull,
        'total' => $faker->randomDigitNotNull,
        'date_in' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
