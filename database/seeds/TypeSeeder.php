<?php

use Illuminate\Database\Seeder;
use App\Type;

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

        // Schema::disableForeignKeyConstraints();
        // for ($i = 1; $i < 150; $i++) {
        //     $type=Type::inRandomOrder()->limit(1)->first();
        //     DB::table('restaurant_type')->insert(
        //         ['type_id' => $type->id, 'restaurant_id' => rand(1,100)],
        //     );
        // }
    }
}
