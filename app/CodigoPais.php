<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodigoPais extends Model
{
    protected $table = 'codigos_paises_numeros';
    protected $primaryKey = 'idCodigoPaisNumero';
    protected $fillable = [
        'nombrePais',
        'codigoPais',
        'fotoPais'
    ];
}
