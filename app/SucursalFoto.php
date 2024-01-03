<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SucursalFoto extends Model
{
    protected $fillable = [
        'sucursal', 'id_estado', 'id_municipio', 'foto'
    ];
}
