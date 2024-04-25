<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'texto',
        'creado_por'
    ];

    public function creadoPor()
    {
        return $this->belongsTo(Usuario::class, 'creado_por');
    }

}
