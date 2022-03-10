<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table -> id();
            $table -> string('brand_name');
            $table -> string('email') ->unique();
            $table -> string('password');
            $table -> string('address');
            $table -> enum('city',['Milano', 'Napoli', 'Roma', 'Bologna', 'Firenze', 'Venezia', 'Torino', 'Pisa', 'Bari', 'Palermo', 'Cosenza', 'Cagliari']);
            $table -> string('p_iva',30)->unique();
            $table -> text('description') -> nullable();
            $table -> string('image') -> default('risto_default.jpeg');
            $table -> decimal('order_min', 4,2) -> nullable();
            $table -> decimal('delivery_price', 4,2);
            $table -> integer('discount');
            $table -> float('rating',2,1) -> nullable();
            $table -> integer('num_rating') -> default(0);
            $table -> rememberToken();
            $table->softDeletes();
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
        // $table->dropSoftDeletes();
        Schema::dropIfExists('users');
    }
}
