<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profile_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('team_id')->references('id')->on('team_empresas');
            $table->foreignId('profile_team_type_id')->references('id')->on('profile_user_types');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('profile_teams');
    }
};
