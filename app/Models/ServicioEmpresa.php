<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioEmpresa extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'nombre_servicio',
        'duracion',
        'sucursal_id',
        'empresa_id',
        'created_at'
    ];
}