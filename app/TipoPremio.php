<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPremio extends Model
{
    protected $table = 'tipos_premios';
    protected $primaryKey = 'idTipoPremio';
    protected $fillable = [
    	'nombreTipoPremio'
    ];
}
