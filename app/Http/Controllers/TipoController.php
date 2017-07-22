<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Tipo;
use Illuminate\Support\Facades\Redirect;
use deli\Http\Requests\EstadoFormRequest;
use DB;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request){
            $query = trim($request -> get('searchText'));
            $tipo=DB::table('tipo')->where('nombre','LIKE','%'.$query.'%')
                ->where ('visible','=','1')
                ->orderBy('idTipo','asc')
                ->paginate(7);
            return view('admin.pedidos.tipo.index',["tipo" => $tipo, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pedidos.tipo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo = new tipo;
        $tipo -> nombre = $request->get('nombre');
        $tipo -> visible = '1';
        $tipo -> save();
        return Redirect::to('admin/pedidos/tipo');
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
        return view("admin.pedidos.tipo.edit",["tipo"=>tipo::findOrFail($id)]);
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
        $tipo = tipo::findOrFail($id);
        $tipo -> nombre = $request->get('nombre');
        $tipo -> update();
        return Redirect::to('admin/pedidos/tipo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo = tipo::findOrFail($id);
        $tipo -> visible = '0';
        $tipo -> update();
        return Redirect::to('admin/pedidos/tipo');
    }
}
