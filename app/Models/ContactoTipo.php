<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoTipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'descripcion'
    ];
}
