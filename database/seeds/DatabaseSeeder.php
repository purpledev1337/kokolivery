<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // $this->call(OrderSeeder::class);
=======
        $this->call([
            UserSeeder::class,
            TypeSeeder::class,
        ]
        );
>>>>>>> 3dbd5f441bc649ef114d93e3fcfb5a3852b2a55b
    }
}
