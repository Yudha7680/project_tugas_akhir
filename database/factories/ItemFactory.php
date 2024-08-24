<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Item;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'code' => $faker->word,
        'specification' => $faker->word,
        'photo' => $faker->word,
        'status' => $faker->randomElement(['bekas']),
        'total' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
