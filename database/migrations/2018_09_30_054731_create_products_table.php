<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name');
         $table->integer('quantity');
         $table->text('description');
         $table->integer('admin_id');
         $table->integer('votes')->nullable();
         $table->integer('views')->nullable();
         $table->integer('price');
         $table->integer('category_id');
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
        Schema::dropIfExists('products');
    }
}
