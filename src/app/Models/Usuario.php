<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombre',
        'correo',
        'puede_postear',
        'puede_crear_usuarios',
        'clave'
    ];

    protected $hidden = [
        'clave'
    ];

}
