<?php

namespace deli\Http\Controllers;

use Illuminate\Http\Request;

use deli\Pedido;
use deli\Detalle;
use Illuminate\Support\Facades\Redirect;
use DB;
use Response;
use Carbon\Carbon;


class PedidoController extends Controller
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


    public function index(Request $request){

        if($request){
            $query = trim($request->get('searchText'));
            $pedido = DB::table('pedido')
                ->join('estado', 'pedido.idEstado', '=', 'estado.idEstado')
                ->join('zona', 'pedido.idZona', '=', 'zona.idZona')
                ->select('pedido.idPedido','pedido.fecha','pedido.montoP', 'estado.nombre as estado', 'zona.nombre as zona')
                ->where('pedido.idPedido','LIKE','%'.$query.'%')
                ->where('pedido.visible','=','1')
                ->orderBy('pedido.idPedido','asc')
                ->paginate(10);
            return view('admin.pedidos.pedido.index',["pedido"=>$pedido,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $estado = DB::table('estado')
            ->where('visible', '=', '1') -> get();
        $zona = DB::table('zona')
            ->where('visible', '=', '1') -> get();
        $producto = DB::table('producto')
            ->select('idProducto','nombre','precio')
            ->where('visible', '=', '1') -> get();
        return view("admin.pedidos.pedido.create",["zona" => $zona, "estado" => $estado, "producto" => $producto]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $pedido = new Pedido;
            $pedido -> idZona = $request -> get('idZona');
            $pedido -> idEstado = $request -> get('idEstado');
            $pedido -> montoP = $request -> get('montoP');
            $my_time = Carbon::now('America/La_Paz');
            $pedido -> fecha = $my_time -> toDateTimeString();
            $pedido -> visible = '1';
            $pedido -> save();

            $idProd = $request ->get('idProductoT');
            $cant = $request -> get('cantidadTabla');
            $subTotal = $request -> get('subTotal');
            $cont = 0;

            while ($cont < count($idProd)) {
                $detalle = new Detalle();
                $detalle -> idPedido = $pedido -> idPedido;
                $detalle -> idProducto = $idProd[$cont];
                $detalle -> cantidad = $cant[$cont];
                $detalle -> montoD = $subTotal[$cont];
                $detalle -> save();
                $cont = $cont + 1;
            }

            DB::commit();

        } catch (Exception $e) {

            DB::rollback();

        }


        return  Redirect::to('admin/pedidos/pedido');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = DB::table('pedido')
            -> join('zona', 'zona.idZona', '=', 'pedido.idZona')
            -> join('estado', 'estado.idEstado', '=', 'pedido.idEstado')
            -> select('pedido.idPedido', 'pedido.fecha', 'pedido.montoP', 'zona.nombre as zona', 'zona.costo', 'estado.nombre as estado')
            -> where('pedido.idPedido', '=', $id)
            -> first();

        $detalle = DB::table('detalle')
            -> join('producto', 'producto.idProducto', '=', 'detalle.idProducto')
            -> select('producto.nombre', 'detalle.cantidad', 'producto.precio', 'detalle.montoD')
            -> where('detalle.idPedido','=', $id)
            -> get();

        return view('admin.pedidos.pedido.show',["pedido"=>$pedido,"detalle"=>$detalle]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
