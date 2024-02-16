<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZFrase extends Model
{
    protected $filable = [
        'frase',
        'imagen',
        'aux',
    ];
}
