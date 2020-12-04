<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boleta extends Model
{
    protected $table = 'boletas';
    protected $primaryKey = 'idBoleta';
    protected $fillable = [
    	'totalBoleta',
    	'idUsuario'
    ];
}
