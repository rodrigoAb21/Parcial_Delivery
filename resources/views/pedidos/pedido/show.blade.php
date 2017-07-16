@extends ('admin')
@section ('contenido')
 <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            
    <h3>Pedido #: {{$pedido -> idPedido}}</h3>
    <h4>Fecha: {{$pedido -> fecha}}</h4>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label for="montoTotal">Monto Total</label>
                <p>{{$pedido -> montoP}}</p>
            </div>
        </div>
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label>Estado</label>
                    <p>{{$pedido -> estado}}</p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <div class="form-group">
                <label>Zona</label>
                <p>{{$pedido -> zona}}</p>
            </div>
        </div>
    </div>       
    <div class="row">
        <div class="table-responsive">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <table id="carrito" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color: #A9D0F5">
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>P. Unitario</th>
                    <th>Precio</th>
                    </thead>
                    <tbody>
                    @foreach($detalle as $det)
                        <tr>
                            <td>{{$det -> nombre}}</td>
                            <td>{{$det -> cantidad}}</td>
                            <td>{{$det -> precio}}</td>
                            <td>{{$det -> montoD}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th><h5>Sub-Total</h5></th>
                        <th></th>
                        <th></th>
                        <th><h5>Bs. {{$pedido -> montoP - $pedido -> costo}}</h5>
                    </tr>
                    <tr>
                        <th><h5>Costo de envio</h5></th>
                        <th></th>
                        <th></th>
                        <th><h5>Bs. {{$pedido -> costo}}</h5></th>
                    </tr>
                    <tr>
                        <th><h4>TOTAL</h4></th>
                        <th></th>
                        <th></th>
                        <th><h4>Bs. {{$pedido -> montoP}}</h4></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection