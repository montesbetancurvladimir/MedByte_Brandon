<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('team_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_team')->references('id')->on('team_empresas');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('team_users');
    }
};
