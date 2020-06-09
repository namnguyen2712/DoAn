<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
             $table->string('sum');
            $table->integer('cus_id')->length(10)->unsigned();
            $table->foreign('cus_id')->references('id')->on('user')->onDelete('CASCADE');
            $table->tinyInteger('type');
            $table->string('note');
            $table->string('r_name')->nullable();
            $table->string('r_phone')->nullable();
            $table->string('r_address')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('order');
    }
}
