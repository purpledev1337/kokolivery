<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        
        'brande_name' => $faker -> company(),
        'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
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
