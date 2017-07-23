<?php

namespace deli;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido';

    protected $primaryKey = 'idPedido';

    public $timestamps = true;

    protected $fillable = [
        'fecha',
        'montoP',
        'ciCliente',
        'idEstado',
        'visible'
    ];
}
