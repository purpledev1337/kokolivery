<?php

use App\Type;
use Illuminate\Database\Seeder;

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
       /*  factory(User::class,30) -> create() -> each(function($user){

            $type = Type::inRandomOrder() -> limit(1) -> first();

            $user -> types() -> attach($type);
            
            $user -> save();
        }); */
        factory(User::class,10)-> create();
       /*  ->each(function($user){
            $type=Type::inRandomOrder()->limit(rand(1,3))->get();
            $user->types()->attach($type);
            $user->save();
        }); */
    }
}
