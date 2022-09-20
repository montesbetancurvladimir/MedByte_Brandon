<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\ContactoTipo;

return new class extends Migration
{
    //Crear la tabla.
    public function up()
    {
        Schema::create('contacto_tipos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 50);
            $table->timestamps();
        });
        ContactoTipo::create(['id'=>'1','descripcion' => 'Email']);
        ContactoTipo::create(['id'=>'2','descripcion' => 'Dirección']);
        ContactoTipo::create(['id'=>'3','descripcion' => 'Teléfono']);
    }

    //Revierte los cambios.
    public function down()
    {
        Schema::dropIfExists('contacto_tipos');
    }
};
