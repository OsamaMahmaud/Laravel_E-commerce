<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\products;
use Faker\Generator as Faker;

$factory->define(products::class, function (Faker $faker) {
    return [
        //
        'name' => $this->faker->name(),
        'description' => $this->faker->text(),
        'image' => $this->faker->imageUrl(),
        'price' => $this->faker->randomFloat(2, 10, 100),
        'discount_price' => $this->faker->randomFloat(2, 5, 50),
        'color'=> $this->faker->safeColorName(),
        'size'=> $this->faker->randomElement(['S', 'M','L']),
        'category_id' => $this->faker->numberBetween(1, 10),
        'created_at' => now(),
        'updated_at' => now(),
        'deleted_at' => null,
    ];
});
