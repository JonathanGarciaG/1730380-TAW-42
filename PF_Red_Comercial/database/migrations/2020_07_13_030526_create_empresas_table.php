<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('descripcion');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_ubicacion');
            $table->unsignedBigInteger('id_categoria');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('id_ubicacion')->references('id')->on('ubicacion')->onDelete('cascade');
            $table->foreign('id_categoria')->references('id')->on('categoria_empresa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
