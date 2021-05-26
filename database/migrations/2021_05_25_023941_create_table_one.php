<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOne extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_one', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('pais')->nullable();
            $table->string('tipo_de_producto')->nullable();
            $table->string('nombre_producto')->nullable();
            $table->float('precio_unitario')->default(0.0);
            $table->date('fecha_precio');
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
        Schema::dropIfExists('table_one');
    }
}
