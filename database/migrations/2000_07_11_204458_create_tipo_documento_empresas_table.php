<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TipoDocumentoEmpresa;

return new class extends Migration
{
    public function up()
    {
        Schema::create('tipo_documento_empresas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 50);
            $table->timestamps();
        });
        TipoDocumentoEmpresa::create(['id'=>'1','descripcion' => 'NIT.','created_at' => now()]);
        TipoDocumentoEmpresa::create(['id'=>'2','descripcion' => 'Cédula de Ciudadanía.','created_at' => now()]);
        TipoDocumentoEmpresa::create(['id'=>'3','descripcion' => 'Cédula de Extranjería','created_at' => now()]);
        TipoDocumentoEmpresa::create(['id'=>'4','descripcion' => 'Pasaporte','created_at' => now()]);
    }
   
    public function down()
    {
        Schema::dropIfExists('tipo_documento_empresas');
    }
};
