<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'tipo_documento_id',
        'nombre1',
        'nombre2',
        'apellido1',
        'apellido2',
        'celular',
        'email',
        'password',
        'numero_id',
        'tarjeta_profesional',
        'foto_perfil',
        'contador',
        'activo'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
