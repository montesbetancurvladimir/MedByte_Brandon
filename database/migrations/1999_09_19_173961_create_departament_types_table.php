<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DepartamentType;

return new class extends Migration
{
    public function up()
    {
        Schema::create('departament_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_type_id')->constrained()->onDelete('cascade');
            $table->string('descripcion');
            $table->integer('codigo_dane');
            $table->timestamps();
        });
        DepartamentType::create(['id'=>'1','country_type_id'=>'1','descripcion' => 'CUNDINAMARCA','codigo_dane'=>'25']);
        DepartamentType::create(['id'=>'2','country_type_id'=>'1','descripcion' => 'ANTIOQUIA','codigo_dane'=>'5']);
        DepartamentType::create(['id'=>'4','country_type_id'=>'1','descripcion' => 'ATLANTICO','codigo_dane'=>'8']);
        DepartamentType::create(['id'=>'5','country_type_id'=>'1','descripcion' => 'BOGOTA','codigo_dane'=>'11']);
        DepartamentType::create(['id'=>'6','country_type_id'=>'1','descripcion' => 'BOLIVAR','codigo_dane'=>'13']);
        DepartamentType::create(['id'=>'7','country_type_id'=>'1','descripcion' => 'BOYACA','codigo_dane'=>'15']);
        DepartamentType::create(['id'=>'8','country_type_id'=>'1','descripcion' => 'CALDAS','codigo_dane'=>'17']);
        DepartamentType::create(['id'=>'9','country_type_id'=>'1','descripcion' => 'CAQUETA','codigo_dane'=>'18']);
        DepartamentType::create(['id'=>'10','country_type_id'=>'1','descripcion' => 'CAUCA','codigo_dane'=>'19']);
        DepartamentType::create(['id'=>'11','country_type_id'=>'1','descripcion' => 'CESAR','codigo_dane'=>'20']);
        DepartamentType::create(['id'=>'12','country_type_id'=>'1','descripcion' => 'CORDOBA','codigo_dane'=>'23']);
        DepartamentType::create(['id'=>'14','country_type_id'=>'1','descripcion' => 'CHOCO','codigo_dane'=>'27']);
        DepartamentType::create(['id'=>'15','country_type_id'=>'1','descripcion' => 'HUILA','codigo_dane'=>'41']);
        DepartamentType::create(['id'=>'16','country_type_id'=>'1','descripcion' => 'LA GUAJIRA','codigo_dane'=>'44']);
        DepartamentType::create(['id'=>'17','country_type_id'=>'1','descripcion' => 'MAGDALENA','codigo_dane'=>'47']);
        DepartamentType::create(['id'=>'18','country_type_id'=>'1','descripcion' => 'META','codigo_dane'=>'50']);
        DepartamentType::create(['id'=>'19','country_type_id'=>'1','descripcion' => 'NARIÃ‘O','codigo_dane'=>'52']);
        DepartamentType::create(['id'=>'20','country_type_id'=>'1','descripcion' => 'NORTE DE SANTANDER','codigo_dane'=>'54']);
        DepartamentType::create(['id'=>'21','country_type_id'=>'1','descripcion' => 'QUINDIO','codigo_dane'=>'63']);
        DepartamentType::create(['id'=>'22','country_type_id'=>'1','descripcion' => 'RISARALDA','codigo_dane'=>'66']);
        DepartamentType::create(['id'=>'23','country_type_id'=>'1','descripcion' => 'SANTANDER','codigo_dane'=>'68']);
        DepartamentType::create(['id'=>'24','country_type_id'=>'1','descripcion' => 'SUCRE','codigo_dane'=>'70']);
        DepartamentType::create(['id'=>'25','country_type_id'=>'1','descripcion' => 'TOLIMA','codigo_dane'=>'73']);
        DepartamentType::create(['id'=>'26','country_type_id'=>'1','descripcion' => 'VALLE','codigo_dane'=>'76']);
        DepartamentType::create(['id'=>'27','country_type_id'=>'1','descripcion' => 'ARAUCA','codigo_dane'=>'81']);
        DepartamentType::create(['id'=>'28','country_type_id'=>'1','descripcion' => 'CASANARE','codigo_dane'=>'85']);
        DepartamentType::create(['id'=>'29','country_type_id'=>'1','descripcion' => 'PUTUMAYO','codigo_dane'=>'86']);
        DepartamentType::create(['id'=>'30','country_type_id'=>'1','descripcion' => 'SAN ANDRES','codigo_dane'=>'88']);
        DepartamentType::create(['id'=>'31','country_type_id'=>'1','descripcion' => 'AMAZONAS','codigo_dane'=>'91']);
        DepartamentType::create(['id'=>'32','country_type_id'=>'1','descripcion' => 'GUAINIA','codigo_dane'=>'94']);
        DepartamentType::create(['id'=>'33','country_type_id'=>'1','descripcion' => 'GUAVIARE','codigo_dane'=>'95']);
        DepartamentType::create(['id'=>'34','country_type_id'=>'1','descripcion' => 'VAUPES','codigo_dane'=>'97']);
        DepartamentType::create(['id'=>'35','country_type_id'=>'1','descripcion' => 'VICHADA','codigo_dane'=>'99']);

    }
    public function down()
    {
        Schema::dropIfExists('departament_types');
    }
};
