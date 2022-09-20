<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamEmpresa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_empresa',
        'description',
        'created_at'

    ];
}
