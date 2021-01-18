<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $primaryKey = 'idEstado';
    protected $fillable = [
        'nombreEstado',
        'idTipoEstado'
    ];
}
