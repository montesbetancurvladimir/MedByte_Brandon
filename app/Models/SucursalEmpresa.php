<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SucursalEmpresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion',
        'pais',
        'municipio',
        'ciudad',
        'direccion',
        'telefono',
        'tipo_documento',
        'documento',
        'razon_social',
        'logo',
        'sede',
        'estado_sede',
        'tipo_sede',
        'empresa_id',
        'user_id',
        'created_at'
    ];
}
