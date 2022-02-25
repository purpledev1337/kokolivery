<?php

use Illuminate\Database\Seeder;
use App\Type;
use App\User;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            ['name' => 'Italiano'],
            ['name' => 'Cinese'],
            ['name' => 'Thailandese'],
            ['name' => 'Sushi'],
            ['name' => 'Pizza'],
            ['name' => 'Giapponese'],
            ['name' => 'FastFood'],
            ['name' => 'Pizzeria'],
            ['name' => 'Paninoteca'],
            ['name' => 'Piadineria'],
            ['name' => 'Kebab'],
            ['name' => 'Bisteccheria'],
            ['name' => 'Poke'],
            ['name' => 'Americano'],
            ['name' => 'Gelato'],
            ['name' => 'Hamburgher'],
            ['name' => 'Dessert'],
            ['name' => 'Messicano'],
            ['name' => 'Indiano'],
            ['name' => 'Brasiliano'],
        ]);

        User::all() -> each(function($user){
            $types = Type::inRandomOrder() -> limit(rand(1,3)) -> get();
            $user -> types() -> attach($types);
            $user -> save();
        });
    }
}
