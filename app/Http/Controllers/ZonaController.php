<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Http\Requests;
use deli\Zona;
use Illuminate\Support\Facades\Redirect;
use deli\Http\Requests\ZonaFormRequest;
use DB;

class ZonaController extends Controller
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
            $zona=DB::table('zona')->where('nombre','LIKE','%'.$query.'%')
                ->where ('visible','=','1')
                ->orderBy('idZona','asc')
                ->paginate(7);
            return view('admin.pedidos.zona.index',["zona" => $zona, "searchText" => $query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pedidos.zona.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zona = new Zona;
        $zona -> nombre = $request->get('nombre');
        $zona -> costo = $request->get('costo');
        $zona -> visible = '1';
        $zona -> save();
        return Redirect::to('admin/pedidos/zona');
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        return view("admin.pedidos.zona.edit",["zona"=>Zona::findOrFail($id)]);
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
        $zona = Zona::findOrFail($id);
        $zona -> nombre = $request->get('nombre');
        $zona -> costo = $request->get('costo');
        $zona -> update();
        return Redirect::to('admin/pedidos/zona');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zona = Zona::findOrFail($id);
        $zona -> visible = '0';
        $zona -> update();
        return Redirect::to('admin/pedidos/zona');
    }
}
