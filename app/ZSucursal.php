<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZSucursal extends Model
{
    protected $fillable = [
        'id_estado', 'id_municipio', 'sucursal', 'coordX', 'coordY'
    ];
}
