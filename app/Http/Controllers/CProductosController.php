<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use deli\Http\Requests\ProductoFormRequest;
use DB;

class CProductosController extends Controller
{
    public function hamburguesas()
    {
        $producto=DB::table('producto')
            ->join('tipo','tipo.idTipo','=','producto.idTipo')
            ->where ('producto.visible','=','1')
            ->where ('tipo.nombre','=','hamburguesa')
            ->select('producto.idProducto', 'producto.nombre', 'producto.precio', 'producto.imagen')
            ->orderBy('idProducto','asc')
            ->paginate(12);

        return view('cliente.productos',["producto"=>$producto]);

    }

    public function pollos()
    {
        $producto=DB::table('producto')
            ->join('tipo','tipo.idTipo','=','producto.idTipo')
            ->where ('producto.visible','=','1')
            ->where ('tipo.nombre','=','pollo')
            ->select('producto.idProducto', 'producto.nombre', 'producto.precio', 'producto.imagen')
            ->orderBy('idProducto','asc')
            ->paginate(12);

        return view('cliente.productos',["producto"=>$producto]);

    }

    public function combos()
    {
        $producto=DB::table('producto')
            ->join('tipo','tipo.idTipo','=','producto.idTipo')
            ->where ('producto.visible','=','1')
            ->where ('tipo.nombre','=','combo')
            ->select('producto.idProducto', 'producto.nombre', 'producto.precio', 'producto.imagen')
            ->orderBy('idProducto','asc')
            ->paginate(12);

        return view('cliente.productos',["producto"=>$producto]);

    }

    public function bebidas()
    {
        $producto=DB::table('producto')
            ->join('tipo','tipo.idTipo','=','producto.idTipo')
            ->where ('producto.visible','=','1')
            ->where ('tipo.nombre','=','bebida')
            ->select('producto.idProducto', 'producto.nombre', 'producto.precio', 'producto.imagen')
            ->orderBy('idProducto','asc')
            ->paginate(12);

        return view('cliente.productos',["producto"=>$producto]);

    }

    public function complementos()
    {
        $producto=DB::table('producto')
            ->join('tipo','tipo.idTipo','=','producto.idTipo')
            ->where ('producto.visible','=','1')
            ->where ('tipo.nombre','=','complemento')
            ->select('producto.idProducto', 'producto.nombre', 'producto.precio', 'producto.imagen')
            ->orderBy('idProducto','asc')
            ->paginate(12);

        return view('cliente.productos',["producto"=>$producto]);

    }
}
