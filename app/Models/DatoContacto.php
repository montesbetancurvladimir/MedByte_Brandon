<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatoContacto extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'natural_id',
        'tipo_contacto_id',
        'descripcion',
        'pais_id',
        'departamento_id',
        'municipio_id',
        'created_at'
    ];
}
