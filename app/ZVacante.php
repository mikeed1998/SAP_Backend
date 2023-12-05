<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZVacante extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'orden',
        'portada',
        'color',
    ];
}
