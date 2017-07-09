<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $table = 'detalle';

    protected $primaryKey = 'idDetalle';

    public $timestamps = true;

    protected $fillable = [
        'idProducto',
        'idPedido',
        'cantidad',
        'montoD'
    ];
}
