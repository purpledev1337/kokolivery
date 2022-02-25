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
        Schema::table('dish_order', function (Blueprint $table) {
            $table->foreign('dish_id', 'dish_order')
                  ->references('id')
                  ->on('dishes');
            $table->foreign('order_id', 'order_dish')
                  ->references('id')
                  ->on('orders');
        });
        
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
        Schema::table('dish_order', function (Blueprint $table) {
            $table->dropForeign('dish_order');
            $table->dropForeign('order_dish');
        });

        Schema::table('restaurant_type', function (Blueprint $table) {
            $table  -> dropForeign('restaurant_type');
            $table  -> dropForeign('type_restaurant');
        });
    }
}
