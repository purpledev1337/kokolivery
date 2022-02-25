<?php

use Illuminate\Database\Seeder;

use App\Order;

use App\Dish;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 10) -> create();
        //  -> each(function($o){

        //     $dishes = Dish::inRandomOrder()->limit(rand(0,5))->get();
        //     $o -> dishes() -> attach($dishes);
        //     $o -> save();
        // });
    }
}
