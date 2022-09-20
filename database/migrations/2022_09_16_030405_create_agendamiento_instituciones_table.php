<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('institucion_agendamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas');
            $table->string('lunes',20);
            $table->string('martes',20);
            $table->string('miercoles',20);
            $table->string('jueves',20);
            $table->string('viernes',20);
            $table->string('sabado',20);
            $table->string('domingo',20);

            $table->string('lunes_open',20);
            $table->string('lunes_close',20);
            $table->string('martes_open',20);
            $table->string('martes_close',20);
            $table->string('miercoles_open',20);
            $table->string('miercoles_close',20);
            $table->string('jueves_open',20);
            $table->string('jueves_close',20);
            $table->string('viernes_open',20);
            $table->string('viernes_close',20);
            $table->string('sabado_open',20);
            $table->string('sabado_close',20);
            $table->string('domingo_open',20);
            $table->string('domingo_close',20);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('institucion_agendamientos');
    }
};
