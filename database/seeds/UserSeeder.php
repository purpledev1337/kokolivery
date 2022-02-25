<?php

use Illuminate\Database\Seeder;

use App\Type;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,100) -> create() -> each(function($restaurant){
            $types = Type::inRandomOrder() -> limit(rand(1,3)) -> get();
            $restaurant -> types() -> attach($types);
            $restaurant -> save();
        });
    }
}
