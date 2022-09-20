<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profile_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('profile_user_type_id')->references('id')->on('profile_user_types');
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('profiles_users');
    }
};
