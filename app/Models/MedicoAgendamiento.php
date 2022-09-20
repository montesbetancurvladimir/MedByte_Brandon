<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoAgendamiento extends Model
{
    protected $fillable = [
        'empresa_id',
        'lunes',
        'martes',
        'miercoles',
        'jueves',
        'viernes',
        'sabado',
        'domingo',
        'lunes_open',
        'lunes_close',
        'martes_open',
        'martes_close',
        'miercoles_open',
        'miercoles_close',
        'jueves_open',
        'jueves_close',
        'viernes_open',
        'viernes_close',
        'sabado_open',
        'sabado_close',
        'domingo_open',
        'domingo_close',
        'created_at'
    ];


}
