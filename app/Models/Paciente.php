<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{   
    protected $fillable = [
        'natural_id',
        'empresa_id'
    ];
}
