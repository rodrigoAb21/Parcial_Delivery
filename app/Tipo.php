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


    public function scope_getTipos($query, $busqueda){
        $tipo = $query ->where('nombre','LIKE','%'.$busqueda.'%')
            -> where('visible','1')
            -> orderBy('idTipo','asc');
        return $tipo;
    }


}
