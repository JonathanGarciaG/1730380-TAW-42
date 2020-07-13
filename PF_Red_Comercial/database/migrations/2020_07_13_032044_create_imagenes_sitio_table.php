<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenesSitioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagenes_sitio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('imagen');
            $table->unsignedBigInteger('id_micrositio');
            $table->timestamps();
            $table->foreign('id_micrositio')->references('id')->on('micrositios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imagenes_sitio');
    }
}
