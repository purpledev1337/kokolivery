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
        
        Schema::table('type_user', function (Blueprint $table) {
            $table  -> foreign('user_id', 'user_type')
                    -> references('id')
                    -> on('users');

            $table  -> foreign('type_id', 'type_user')
                    -> references('id')
                    -> on('types');
        });

        Schema::table('guests', function (Blueprint $table) {

            $table->foreign('order_id', 'id_order')
                  ->references('id')
                  ->on('orders');
        });

        Schema::table('dishes', function (Blueprint $table) {

            $table->foreign('user_id', 'id_user')
                  ->references('id')
                  ->on('users');
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

        Schema::table('type_user', function (Blueprint $table) {
            $table  -> dropForeign('user_type');
            $table  -> dropForeign('type_user');
        });

        Schema::table('guests', function (Blueprint $table) {

            $table->dropForeign('id_order');
        });

        Schema::table('dishes', function (Blueprint $table) {

            $table->dropForeign('id_user');
        });

    }
}
