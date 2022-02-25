<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        
        'name' => $faker -> firstName(),
        'lastname' => $faker -> lastName(),
        'address' => $faker -> address(),
        'email' => $faker -> unique() -> email()
    ];
});
