<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZBlog extends Model
{
    protected $fillable = [
        'titulo', 'resumen', 'portada', 'post', 'color'
    ];
}
