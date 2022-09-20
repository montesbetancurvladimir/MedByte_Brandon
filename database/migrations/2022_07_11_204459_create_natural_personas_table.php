<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //Crear la tabla.
    public function up()
    {
        Schema::create('natural_personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_documento_id')->references('id')->on('tipo_documentos')->nullable();
            $table->string('documento', 20);
            $table->date('fecha_nacimiento');
            $table->string('nombre1');
            $table->string('nombre2')->nullable();;
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('genero',30);
            $table->string('tipo_sangre',30);
            $table->timestamps();
        });
    }

    //Revierte los cambios.
    public function down()
    {
        Schema::dropIfExists('natural_personas');
    }
};
