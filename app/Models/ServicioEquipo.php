<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicioEquipo extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'servicio_id',
        'team_id',
        'created_at'
    ];
}