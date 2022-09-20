<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmpresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'descripcion',
        'user_id',
        'empresa_id',
        'created_at'
    ];
}