<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $table = 'premios';
    protected $primaryKey = 'idPremio';
    protected $fillable = [
        'imagenPremio',
    	'descripcion',
    	'idPropiedad',
    	'idTipoPremio'
    ];
}
