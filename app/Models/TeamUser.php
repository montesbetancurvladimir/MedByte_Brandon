<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_team',
        'id_user',
        'created_at'
    ];
}
