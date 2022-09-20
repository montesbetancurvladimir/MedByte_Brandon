<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TipoDocumento;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_documentos', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 15);
            $table->timestamps();
        });
        TipoDocumento::create(['id'=>'1','descripcion' => 'Cédula','created_at' => now()]);
        TipoDocumento::create(['id'=>'2','descripcion' => 'NIT','created_at' => now()]);
    }
   

    public function down()
    {
        Schema::dropIfExists('tipo_documentos');
    }
};
