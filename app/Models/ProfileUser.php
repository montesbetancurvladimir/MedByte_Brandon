<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUser extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'user_id',
        'profile_user_type_id',
        'created_at'
    ];
}
