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
                ->join('cliente', 'pedido.ciCliente', '=', 'cliente.ciCliente')
                ->select('pedido.idPedido','pedido.fecha','pedido.montoP', 'estado.nombre as estado', 'cliente.nombre as cliente')
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
        $cliente = DB::table('cliente')
            ->join('zona','cliente.idZona','=','zona.idZona')
            ->select('cliente.ciCliente','cliente.nombre', 'zona.costo as costo')
            ->where('cliente.visible', '=', '1') -> get();
        $producto = DB::table('producto')
            ->select('idProducto','nombre','precio')
            ->where('visible', '=', '1') -> get();
        return view("admin.pedidos.pedido.create",["cliente" => $cliente, "estado" => $estado, "producto" => $producto]);

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
            $pedido -> ciCliente = $request -> get('ciCliente');
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
            -> join('cliente', 'cliente.ciCliente', '=', 'pedido.ciCliente')
            -> join('estado', 'estado.idEstado', '=', 'pedido.idEstado')
            -> join('zona', 'zona.idZona', '=', 'cliente.idZona')
            -> select('pedido.idPedido', 'pedido.fecha', 'pedido.montoP', 'cliente.nombre as cliente', 'zona.costo', 'estado.nombre as estado')
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
