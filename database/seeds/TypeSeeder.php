<?php

use Illuminate\Database\Seeder;

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
            ['name' => 'Amerricano'],
            ['name' => 'Gelato'],
            ['name' => 'Hamburgher'],
            ['name' => 'Dessert'],
        ]);
    }
}
