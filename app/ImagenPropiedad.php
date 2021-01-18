<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenPropiedad extends Model
{
    protected $table = 'imagenes_propiedades';
    protected $primaryKey = 'idImagenPropiedad';
    protected $fillable = [
    	'urlImagen',
    	'idPropiedad'
    ];
}
