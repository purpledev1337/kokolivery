<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('restaurant_type', function (Blueprint $table) {
            $table  -> foreign('restaurant_id', 'restaurant_type')
                    -> references('id')
                    -> on('users');

            $table  -> foreign('type_id', 'type_restaurant')
                    -> references('id')
                    -> on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('restaurant_type', function (Blueprint $table) {
            $table  -> dropForeign('restaurant_type');
            $table  -> dropForeign('type_restaurant');
        });
    }
}
