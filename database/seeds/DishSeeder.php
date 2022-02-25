<?php

use Illuminate\Database\Seeder;

use App\Dish;

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
        factory(Dish::class, 10) -> create() -> each(function($d){

            $orders = Order::inRandomOrder()->limit(rand(0,5))->get();
            $d -> orders() -> attach($orders);
            $d -> save();
        });
    }
}
