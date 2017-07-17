<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Http\Requests;
use deli\Estado;
use Illuminate\Support\Facades\Redirect;
use deli\Http\Requests\EstadoFormRequest;
use DB;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $query = trim($request -> get('searchText'));
            $estado=DB::table('estado')->where('nombre','LIKE','%'.$query.'%')
                ->where ('visible','=','1')
                ->orderBy('idEstado','asc')
                ->paginate(7);
            return view('admin.pedidos.estado.index',["estado" => $estado, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pedidos.estado.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoFormRequest $request)
    {
        $estado = new estado;
        $estado -> nombre = $request->get('nombre');
        $estado -> visible = '1';
        $estado -> save();
        return Redirect::to('admin/pedidos/estado');
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
        return view("admin.pedidos.estado.edit",["estado"=>estado::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoFormRequest $request, $id)
    {
        $estado = estado::findOrFail($id);
        $estado -> nombre = $request->get('nombre');
        $estado -> update();
        return Redirect::to('admin/pedidos/estado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estado = estado::findOrFail($id);
        $estado -> visible = '0';
        $estado -> update();
        return Redirect::to('admin/pedidos/estado');
    }
}
