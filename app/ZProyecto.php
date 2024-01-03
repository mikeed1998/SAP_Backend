<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZProyecto extends Model
{
    protected $fillable = [
        'servicio',
        'titulo',
        'descripcion',
        'portado',
        'color',
    ];
}
