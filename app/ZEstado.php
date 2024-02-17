<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZEstado extends Model
{
    protected $fillable = [
        'estado',
        'descripcion',
        'aux',
    ];
}
