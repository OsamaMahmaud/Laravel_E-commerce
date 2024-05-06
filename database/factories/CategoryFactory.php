<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\categories;
use Faker\Generator as Faker;

$factory->define(categories::class, function (Faker $faker) {
    return [
        //
         'name' => $faker->word,
         'image'=> $faker->randomElement(['1.jpg']),
         'parent_id'=>null,

    ];
});
