<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status_pay' => $faker->boolean,
        'delivery_time' => $faker->numberBetween(1,60),
    ];
});
