<?php

use Illuminate\Database\Seeder;

use App\Guest;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Guest::class, 20) -> create();
    }
}
