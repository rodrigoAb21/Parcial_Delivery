<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipo';

    protected $primaryKey = 'idTipo';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'visible'
    ];
}
