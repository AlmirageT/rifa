<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoletaPropiedad extends Model
{
    protected $table = 'boletas_propiedades';
    protected $primaryKey = 'idBoletaPropiedad';
    protected $fillable = [
    	'idPropiedad',
    	'idBoleta'
    ];
}
