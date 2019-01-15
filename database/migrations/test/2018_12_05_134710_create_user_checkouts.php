<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCheckouts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_checkouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checkout_id');
            $table->integer('product_id');
            $table->string('name');
            $table->integer('price');
            $table->integer('quantity');
            $table->integer('adminid');
            $table->boolean('seen')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_checkouts');
    }
}
