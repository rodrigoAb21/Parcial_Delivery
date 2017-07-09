<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table = 'zona';

    protected $primaryKey = 'idZona';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'precio',
        'visible'
    ];
}
