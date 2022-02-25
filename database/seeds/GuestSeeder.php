<?php

use Illuminate\Database\Seeder;

use App\Guest;
use App\Order;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Guest::class, 80) -> make() -> each(function ($guest) {

            $order = Order::inRandomOrder() -> limit(1) -> first();
            $guest -> order() -> associate($order);
            $guest -> save();

        });

    }
}
