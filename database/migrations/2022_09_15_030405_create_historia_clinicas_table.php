<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historia_clinicas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->references('id')->on('empresas');
            $table->foreignId('paciente_id')->references('id')->on('pacientes');
            $table->string('descripcion',200);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historia_clinicas');
    }
};
