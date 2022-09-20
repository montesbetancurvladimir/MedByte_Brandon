<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('servicio_usuarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->references('id')->on('servicio_empresas');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicio_usuarios');
    }
};
