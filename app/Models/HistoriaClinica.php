<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaClinica extends Model
{
    protected $fillable = [
        'empresa_id',
        'paciente_id',
        'descripcion',
        'created_at'
    ];
}
