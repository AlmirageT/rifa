<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropiedadCaracteristica extends Model
{
    protected $table = 'propiedades_caracteristicas';
    protected $primaryKey = 'idPropiedadCaracteristica';
    protected $fillable = [
        'descripcionCaracterisitca',
    	'idPropiedad',
    	'idTipoCaracteristica'
    ];
}
