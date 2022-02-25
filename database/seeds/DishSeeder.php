<?php

use Illuminate\Database\Seeder;

use App\Dish;
use App\User;
use App\Order;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Dish::class, 600) -> make() -> each(function($dish){
            $user = User::inRandomOrder() -> limit(1) -> first();
            $dish -> user() -> associate($user);
            $dish -> save();

            $orders = Order::inRandomOrder()->limit(rand(0,5))->get();
            $dish -> orders() -> attach($orders);
            $dish -> save();
        });
    }
}
