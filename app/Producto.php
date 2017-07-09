<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';

    protected $primaryKey = 'idProducto';

    public $timestamps = true;

    protected $fillable = [
        'nombre',
        'imagen',
        'precio',
        'descripcion',
        'visible'
    ];
}
