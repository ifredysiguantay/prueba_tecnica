<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableThree extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_three', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_name')->unsigned();
            $table->foreign('product_name')->references('id')->on('table_one')->onDelete('cascade');
            $table->integer('unidades_vendidas')->default(0);
            $table->string('numero_semana');
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
        Schema::dropIfExists('table_three');
    }
}
