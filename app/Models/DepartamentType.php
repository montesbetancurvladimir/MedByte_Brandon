<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion',
        'country_type_id',
        'codigo_dane'
    ];
    public function CountryType(){
        return $this->belongsTo("App\CountryType");
    }
    public function CityType(){
        return $this->hasMany("App\CityType");
    }

}
