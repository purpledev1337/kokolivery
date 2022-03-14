<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dish;
use Faker\Generator as Faker;

$factory->define(Dish::class, function (Faker $faker) {
    return [
        'name' => $faker -> word(),
        'description' => $faker -> sentence(),
        'image_path' => 'asset/dish.jpg',
        'price' => $faker -> randomFloat(2, 1, 99),
        'category' => $faker -> randomElement(['Antipasto', 'Primi Piatti', 'Secondi Piatti', 'Dessert', 'Bibite', 'Pizza']),
    ];
});
