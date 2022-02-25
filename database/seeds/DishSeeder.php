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
        factory(Dish::class, 1800) -> make() -> each(function($dish){
            $restaurant = User::inRandomOrder() -> limit(1) -> first();
            $dish -> restaurant() -> associate($restaurant);
            $dish -> save();

            $orders = Order::inRandomOrder()->limit(rand(0,5))->get();
            $dish -> orders() -> attach($orders);
            $dish -> save();
        });

        // Dish::class -> make() -> each(function($d){
        //     $orders = Order::inRandomOrder()->limit(rand(0,5))->get();
        //     $d -> orders() -> attach($orders);
        //     $d -> save();
        // });
    }
}
