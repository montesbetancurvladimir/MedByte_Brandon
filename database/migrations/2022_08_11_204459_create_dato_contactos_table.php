<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Crear la tabla.
    public function up()
    {
        Schema::create('dato_contactos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('natural_id')->references('id')->on('natural_personas');
            $table->foreignId('tipo_contacto_id')->references('id')->on('contacto_tipos');
            $table->string('descripcion', 40);
            $table->string('pais_id', 40)->nullable();
            $table->string('departamento_id', 40)->nullable();
            $table->string('municipio_id', 40)->nullable();
            $table->timestamps();
        });
    }

    //Revierte los cambios.
    public function down()
    {
        Schema::dropIfExists('dato_contactos');
    }
};
