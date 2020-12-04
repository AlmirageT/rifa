<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Numero extends Model
{
    protected $table = 'numeros';
    protected $primaryKey = 'idNumero';
    protected $fillable = [
    	'numero',
    	'valorNumero',
    	'idBoleta',
    	'idEstado'
    ];
}
