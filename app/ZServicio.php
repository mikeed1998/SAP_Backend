<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZServicio extends Model
{
    protected $fillable = [
        'titulo',
        'descripcion',
        'descripcion2',
        'orden',
        'portada',
        'imagen',
    ];
}
