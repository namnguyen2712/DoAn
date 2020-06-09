<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
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
            $table->string('slug');
            $table->string('ingredient')->nullable();//thành phần
            $table->string('content')->nullable();//hàm lượng
            $table->string('uses')->nullable();//công dụng
            $table->string('using')->nullable();//cách sử dụng
            $table->string('images1');
            $table->string('images2')->nullable();
            $table->string('price');
            $table->string('attention');//chú ý
            $table->integer('cat_id')->length(10)->unsigned();    
            $table->foreign('cat_id')->references('id')->on('category')->onDelete('CASCADE');
            $table->integer('unit_id')->length(10)->unsigned();    
            $table->foreign('unit_id')->references('id')->on('unit')->onDelete('CASCADE');
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
