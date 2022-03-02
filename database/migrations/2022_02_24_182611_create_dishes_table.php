<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table -> id();

            $table -> biginteger('user_id') -> unsigned();
            $table -> string('name');
            $table -> text('description');
            $table -> string('image_path') -> nullable();
            $table -> decimal('price',4,2);
            $table -> enum('category',['Antipasto', 'Primi Piatti', 'Secondi Piatti', 'Dessert', 'Bibite', 'Pizza']);
            $table -> boolean('is_visible') -> default(1);
            $table -> boolean('delete') -> default(0);

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dishes');
    }
}
