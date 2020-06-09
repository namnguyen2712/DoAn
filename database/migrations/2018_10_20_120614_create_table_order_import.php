<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderImport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sum');
            $table->integer('id_employee')->length(10)->unsigned();
            $table->foreign('id_employee')->references('id')->on('user')->onDelete('CASCADE');
            $table->integer('id_supply')->length(10)->unsigned();
            $table->foreign('id_supply')->references('id')->on('supply')->onDelete('CASCADE');
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
        Schema::dropIfExists('import');
    }
}
