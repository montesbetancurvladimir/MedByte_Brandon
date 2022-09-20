<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion',
        'departament_type_id',
        'codigo_dane',
        'orden'
    ];
    public function DepartamentType(){
        return $this->hasMany("App\DepartamentType");
    }
}
