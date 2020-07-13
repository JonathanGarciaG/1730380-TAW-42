<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicrositiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micrositios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_sitio');
            $table->string('color');
            $table->string('contacto');
            $table->string('info');
            $table->string('logo');
            $table->unsignedBigInteger('id_empresa');            
            $table->timestamps();
            $table->foreign('id_empresa')->references('id')->on('empresas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('micrositios');
    }
}
