<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('servicio_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_servicio', 50);
            $table->integer('duracion');
            $table->foreignId('sucursal_id')->references('id')->on('sucursal_empresas');
            $table->foreignId('empresa_id')->references('id')->on('empresas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicio_empresas');
    }
};
