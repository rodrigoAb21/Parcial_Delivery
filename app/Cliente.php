<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'ciCliente';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'referencia',
        'telefono1',
        'telefono2',
        'nacimiento',
        'email',
        'password',
        'idZona',
        'visible'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
