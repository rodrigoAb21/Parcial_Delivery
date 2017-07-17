<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use deli\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $producto=DB::table('producto')->where('nombre','LIKE','%'.$query.'%')
                ->join('tipo', 'producto.idTipo', '=', 'tipo.idTipo')
                ->where ('visible','=','1')
                -select('producto.idProducto', 'producto.nombre', 'producto.precio', 'tipo.nombre as tipo', 'producto.imagen' )
                ->orderBy('idProducto','asc')
                ->paginate(9);
            return view('pedidos.producto.index',["producto"=>$producto,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = DB::table('tipo')
            ->where('visible', '=', '1') -> get();
        return view("pedidos.pedido.create",["tipo" => $tipo]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoFormRequest $request)
    {
        $producto = new Producto;
        $producto -> nombre = $request -> get('nombre');
        $producto -> precio = $request -> get('precio');
        $producto -> descripcion = $request -> get('descripcion');
        $producto -> visible = '1';
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file -> move(public_path().'/img/productos/', $file->getClientOriginalName());
            $producto -> imagen = $file->getClientOriginalName();
        }

        $producto -> save();
        return Redirect::to('pedidos/producto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pedidos.producto.edit",["producto"=>Producto::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoFormRequest $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto -> nombre = $request ->get ('nombre');
        $producto -> precio = $request ->get ('precio');
        $producto -> descripcion = $request ->get ('descripcion');
        $producto -> visible = '1';
        if (Input::hasFile('imagen')) {
            $file = Input::file('imagen');
            $file -> move(public_path().'/img/productos/',$file -> getClientOriginalName());
            $producto -> imagen = $file -> getClientOriginalName();
        }
        $producto -> update();
        return Redirect::to('pedidos/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto -> visible = '0';
        $producto -> update();
        return Redirect::to('pedidos/producto');
    }
}
