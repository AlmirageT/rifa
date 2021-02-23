<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogTransaccion extends Model
{
    protected $table = 'log_transacciones';
    protected $primaryKey = 'idLogTransaccion';
    protected $fillable = [
    	'tipoTransaccion',
    	'modeloOrigen',
    	'idUsuario',
        'webclient'
    ];
}
