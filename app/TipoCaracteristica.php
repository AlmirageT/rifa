<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCaracteristica extends Model
{
    protected $table = 'tipos_caracteristicas';
    protected $primaryKey = 'idTipoCaracteristica';
    protected $fillable = [
    	'nombreTipoCaracteristica',
    	'itag'
    ];
}
