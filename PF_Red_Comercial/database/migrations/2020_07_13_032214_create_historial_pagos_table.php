<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('monto');
            $table->string('metodo_pago');
            $table->string('motivo_pago');
            $table->string('referencia');
            $table->unsignedBigInteger('id_usuario');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_pagos');
    }
}
