<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        'brande_name' => $faker -> company(),
        'email' => $faker -> email(),
        'password' => $faker -> password(),
        'address' => $faker -> address(),
        'city' => $faker -> city(),
        'p_iva' => $faker -> taxId(),
        'description' => $faker -> sentence(),
        'image_path' => 'asset/kokolivery-logo.svg',
        'order_min' => $faker -> randomFloat(2,0,20),
        'delivery_price' => $faker -> randomFloat(2,0,20),
        'discount' => $faker -> numberBeetwen(0,20),
        'rating' => $faker -> randomFloat(1,0,5),
        'num_rating' => $faker -> numberBeetwen(0,1000)
    ];
});
