<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaturalPersona extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'tipo_documento_id',
        'documento',
        'fecha_nacimiento',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'genero',
        'tipo_sangre',
        'created_at'
    ];
}
