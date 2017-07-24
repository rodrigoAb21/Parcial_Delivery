<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;




use deli\Http\Requests\ClienteFormRequest;
use DB;


class ClienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $cliente=DB::table('cliente')->where('cliente.nombre','LIKE','%'.$query.'%')
                ->join('zona', 'cliente.idZona', '=', 'zona.idZona')
                ->where ('cliente.visible','=','1')
                ->select('cliente.ciCliente', 'cliente.nombre', 'cliente.telefono1', 'zona.nombre as zona')
                ->paginate(9);
            return view('admin.pedidos.cliente.index',["cliente"=>$cliente,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zona = DB::table('zona')
            ->where('visible', '=', '1') -> get();
        return view("admin.pedidos.cliente.create",["zona" => $zona]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente;
        $cliente -> ciCliente = $request -> get('ciCliente');
        $cliente -> nombre = $request -> get('nombre');
        $cliente -> direccion = $request -> get('direccion');
        $cliente -> referencia = $request -> get('referencia');
        $cliente -> telefono1 = $request -> get('telefono1');
        $cliente -> telefono2 = $request -> get('telefono2');
        $cliente -> nacimiento = $request -> get('nacimiento');
        $cliente -> email = $request -> get('email');
        $cliente -> password = bcrypt($request['password']);
        $cliente -> idZona = $request -> get('idZona');
        $cliente -> visible = '1';


        $cliente -> save();
        return Redirect::to('admin/pedidos/cliente');
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
        $cliente = Cliente::findOrFail($id);
        $zona = DB::table('zona')
            ->where('visible', '=', '1') -> get();
        return view("admin.pedidos.cliente.edit",["cliente" => $cliente, "zona" => $zona]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente -> ciCliente = $request -> get('ciCliente');
        $cliente -> nombre = $request -> get('nombre');
        $cliente -> direccion = $request -> get('direccion');
        $cliente -> referencia = $request -> get('referencia');
        $cliente -> telefono1 = $request -> get('telefono1');
        $cliente -> telefono2 = $request -> get('telefono2');
        $cliente -> nacimiento = $request -> get('nacimiento');
        $cliente -> email = $request -> get('email');
        $cliente -> password = bcrypt($request['password']);
        $cliente -> idZona = $request -> get('idZona');
        $cliente -> update();
        return Redirect::to('admin/pedidos/cliente');


        /*    VERIFICACION DE CONTRASENAS
        if (Hash::check($request -> get('password'), $cliente -> password))
        {
            $cliente -> nombre = $request ->get ('nombre');
            $cliente -> update();
            return Redirect::to('admin/pedidos/cliente');
        }else{
            return Redirect::to('/');
        }
        */


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente -> visible = '0';
        $cliente -> update();
        return Redirect::to('admin/pedidos/cliente');
    }
}
