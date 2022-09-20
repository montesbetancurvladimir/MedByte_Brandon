<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_documento_id')->references('id')->on('tipo_documentos')->nullable();
            $table->string('nombre1');
            $table->string('nombre2')->nullable();;
            $table->string('apellido1');
            $table->string('apellido2');
            $table->string('celular');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('numero_id',60)->nullable();
            $table->string('tarjeta_profesional',60)->nullable();
            $table->string('foto_perfil',200)->nullable()->default('user.jpg');
            $table->integer('contador')->default(0);
            //Activo = 1 : Inactivo = 0.
            $table->integer('activo')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
