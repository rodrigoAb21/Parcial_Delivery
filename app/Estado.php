<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estado';

    protected $primaryKey = 'idEstado';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'visible'
    ];
}
