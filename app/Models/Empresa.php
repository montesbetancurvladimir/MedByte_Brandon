<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'razon_social',
        'tipo_documento_id',
        'numero_documento',
        'tipo_pais_id',
        'tipo_departamento_id',
        'tipo_ciudad_id',
        'direccion',
        'telefono',
        'email'
    ];
}
