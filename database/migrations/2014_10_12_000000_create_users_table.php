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
            // $table->timestamp('email_verified_at')->nullable();
            $table -> string('password');
            $table -> string('address');
            $table -> enum('city',['Milano', 'Napoli', 'Roma', 'Bologna', 'Firenze', 'Venezia', 'Torino', 'Pisa', 'Bari', 'Palermo', 'Cosenza', 'Cagliari']);
            $table -> string('p_iva',30);
            $table -> text('description') -> nullable();
            $table -> string('image_path') -> nullable();
            $table -> decimal('order_min', 4,2) -> nullable();
            $table -> decimal('delivery_price', 4,2);
            $table -> integer('discount');
            $table -> float('rating',2,1);
            $table -> integer('num_rating') -> default(0);
            $table -> rememberToken();
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
        Schema::dropIfExists('users');
    }
}
