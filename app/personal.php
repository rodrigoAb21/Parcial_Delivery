<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class personal extends Model
{
    protected $table = 'personal';

    protected $primaryKey = 'ci';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono1',
        'nacimiento',
        'email',
        'password',
        'visible'
    ];
}
