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
    public function index()
    {
            $producto=DB::table('producto')
                ->where ('visible','=','1')
                ->orderBy('idProducto','asc')
                ->paginate(12);

            return view('cliente.productos',["producto"=>$producto]);

    }
}
