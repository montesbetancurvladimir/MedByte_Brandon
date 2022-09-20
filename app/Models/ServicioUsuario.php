<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioUsuario extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'servicio_id',
        'user_id',
        'created_at'
    ];
}