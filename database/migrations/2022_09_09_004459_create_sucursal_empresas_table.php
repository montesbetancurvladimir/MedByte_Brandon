<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sucursal_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 50);
            $table->string('pais', 50);
            $table->string('municipio', 50);
            $table->string('ciudad', 50);
            $table->string('direccion', 50);
            $table->string('telefono', 50);
            $table->string('tipo_documento', 50);
            $table->string('documento', 50);
            $table->string('razon_social', 50);

            $table->string('logo',200)->nullable()->default('logo.jpg');
            $table->string('sede',200)->nullable()->default('sede.jpg');

            $table->integer('estado_sede');
            $table->integer('tipo_sede');
            
            $table->foreignId('empresa_id')->references('id')->on('empresas');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('sucursal_empresas');
    }
};
