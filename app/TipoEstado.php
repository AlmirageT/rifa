<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstado extends Model
{
    protected $table = 'tipos_estados';
    protected $primaryKey = 'idTipoEstado';
    protected $fillable = [
    	'nombreTipoEstado'
    ];
}
