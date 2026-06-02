<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public $timestamps = false;

    protected $fillable = [
        'model_type',
        'model_id',
        'tipo'
    ];

    public function modelo()
    {
        return $this->morphTo('model');
    }

}
