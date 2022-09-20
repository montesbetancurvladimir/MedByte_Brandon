<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TeamEmpresas;

return new class extends Migration
{
    public function up()
    {
        Schema::create('team_empresas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_empresa')->references('id')->on('empresas')->nullable();
            $table->string('description');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('team_empresas');
    }
};
