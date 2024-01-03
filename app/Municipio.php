<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = [
        'estado_id', 'clave', 'nombre', 'activo'
    ];
}
