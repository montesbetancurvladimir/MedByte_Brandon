<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Empresa;

return new class extends Migration
{
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            
            $table->string('razon_social');
            $table->foreignId('tipo_documento_id')->references('id')->on('tipo_documento_empresas');
            $table->string('numero_documento',30);

            $table->foreignId('tipo_pais_id')->references('id')->on('country_types');
            $table->foreignId('tipo_departamento_id')->references('id')->on('departament_types');
            $table->foreignId('tipo_ciudad_id')->references('id')->on('city_types');

            $table->string('direccion',100)->nullable();
            $table->string('telefono');
            $table->string('email')->unique();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
