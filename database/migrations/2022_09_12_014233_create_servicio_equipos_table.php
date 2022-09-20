<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('servicio_equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->references('id')->on('servicio_empresas');
            $table->foreignId('team_id')->references('id')->on('team_empresas');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('servicio_equipos');
    }
};
