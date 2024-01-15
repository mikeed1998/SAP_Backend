<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'clave', 'nombre', 'abrev', 'activo'
    ];
}
