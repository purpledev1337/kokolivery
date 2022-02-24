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

            $table -> string('name');
            $table -> text('description');
            $table -> string('image_path');
            $table -> decimal('price',4,2);
            $table -> enum('category',['Antipasto', 'Primo', 'Secondo', 'Dessert', 'Bibite']);
            $table -> boolean('is_visible');

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
