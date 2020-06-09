<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderImportDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_import')->length(10)->unsigned();
            $table->foreign('id_import')->references('id')->on('import')->onDelete('CASCADE');
            $table->integer('pro_id')->length(10)->unsigned();
            $table->foreign('pro_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->integer('quantity');
            $table->string('price');
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
        Schema::dropIfExists('import_detail');
    }
}
