<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTwo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_two', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_name')->unsigned();
            $table->foreign('product_name')->references('id')->on('table_one')->onDelete('cascade');
            $table->integer('cantidad_ingresada')->default(0);
            $table->date('fecha_ingreso_bodega')->nullable();
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
        Schema::dropIfExists('table_two');
    }
}
