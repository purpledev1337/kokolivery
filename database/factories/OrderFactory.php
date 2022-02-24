<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'status-pay' => $faker->boolean,
        'delivery_time' => $faker->datetime(),
    ];
});
