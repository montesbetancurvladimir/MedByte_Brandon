<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ProfileUserType;

return new class extends Migration
{
    public function up()
    {
        Schema::create('profile_user_types', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->timestamps();
        });
        ProfileUserType::create(['id' => '1','description'=>'Administrador','created_at' => now()]);
        ProfileUserType::create(['id' => '2','description'=>'Agendamiento','created_at' => now()]);
        ProfileUserType::create(['id' => '3','description'=>'Mensajes','created_at' => now()]);
        ProfileUserType::create(['id' => '4','description'=>'Estadísticas','created_at' => now()]);
        ProfileUserType::create(['id' => '5','description'=>'Directorio pacientes','created_at' => now()]);
        ProfileUserType::create(['id' => '6','description'=>'Historias Clínicas','created_at' => now()]);
        ProfileUserType::create(['id' => '7','description'=>'Administrador de Agendamiento','created_at' => now()]);
        ProfileUserType::create(['id' => '8','description'=>'Equipo','created_at' => now()]);
    }

    public function down()
    {
        Schema::dropIfExists('profiles_users');
    }
};
