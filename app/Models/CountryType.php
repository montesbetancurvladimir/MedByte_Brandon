<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryType extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion'
    ];
    public function DepartamentType(){
        return $this->hasMany("App\DepartamentType");
    }
}
