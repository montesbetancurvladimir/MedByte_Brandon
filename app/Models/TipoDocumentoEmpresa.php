<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumentoEmpresa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'descripcion',
        'created_at'
    ];
}
