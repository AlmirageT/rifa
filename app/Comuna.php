<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $table = 'comunas';
    protected $primaryKey = 'idComuna';
    protected $fillable = [
    	'nombreComuna',
    	'idProvincia'
    ];
}
