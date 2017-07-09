@extends ('index')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Pedido</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::open(array('url'=>'pedidos/pedido','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="idEstado" class="form-control selectpicker" data-live-search="true">
                    @foreach ($estado as $est)
                       <option value="{{$est -> idEstado}}">{{$est -> nombre}}</option>  
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Zona</label>
                <select id="idZon"  name="idZon"  class="form-control selectpicker"  data-size="6" data-live-search="true">
                    @foreach ($zona as $zon)
                       <option value="{{$zon -> idZona}}_{{$zon -> costo}}">{{$zon -> nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <input type="hidden" id="idZona" name="idZona">
        <input id="montoP" type="hidden" name="montoP" class="form-control" >


    </div>       
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                    <div class="form-group">
                        <label>Productos</label>
                        <select name="idProducto" class="form-control selectpicker" id="idProducto" data-live-search="true" data-size="6">
                            @foreach($producto as $pro)
                            <option value="{{$pro -> idProducto}}_{{$pro -> precio}}">{{$pro -> nombre}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="cant">Cantidad</label>
                        <input type="number" min="1" name="cant" id="cant" class="form-control" >
                        
                    </div>
                </div>
                
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" name="precio" id="precio" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                    </div>
                </div>

                <div class="table-responsive col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <table id="detalle2" class="table table-responsive table-striped table-bordered table-hover">
                        <thead style="background-color: #A9D0F5">
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Sub Total</th>
                        </thead>
                        <tbody id="detalle">

                        </tbody>
                        <tfoot>
                        <tr>
                            <th><h4>Sub-Total</h4></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="stotal">Bs. 0.00</h4>
                        </tr>
                        <tr>
                            <th><h4>Costo de Envio</h4></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h4 id="costo_envio">Bs. 0.00</h4>
                        </tr>
                        <tr>
                            <th><h3>TOTAL</h3></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th><h3 id="total_precio">Bs. 0.00</h3><input type="hidden" name="total_precio" id="total_precio"></th>
                        </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
           <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div> 
        </div>
            
    </div>
        
			{!!Form::close()!!}
    @push('scripts')
    <script>
        $(document).ready(
            function () {
                mostrarPrecio();
                zonaFun();
                mostrarTotal();
                evaluar();
                $("#montoP").val(total);
                $('#bt_add').click(
                    function () {
                        agregar();
                        evaluar();
                    }
                );
            }
        );

        var cont = 0;
        total = 0;
        subTotal = [];
        costoZona = 0;
        totalFactura = 0;

        function mostrarPrecio() {
            datosProducto = document.getElementById('idProducto').value.split('_');
            $('#precio').val(datosProducto[1]);
        }

        function zonaFun() {
            datosZona = document.getElementById('idZon').value.split('_');
            $('#idZona').val(datosZona[0]);
            costoZona = parseFloat(datosZona[1]);
            $("#costo_envio").html("Bs. "+costoZona);
            mostrarTotal();
        }

        $('#idProducto').change(mostrarPrecio);
        $('#idZon').change(zonaFun);

        function mostrarTotal() {
            totalFactura = total + costoZona;

            $("#stotal").html("Bs." + total);
            $("#total_precio").html("Bs." + totalFactura);//  html porq es un h4
            $("#montoP").val(totalFactura);// val porq es un input

        }

        function agregar() {
            datosProducto = document.getElementById('idProducto').value.split('_');
            idProductoT = datosProducto[0];
            nombreProducto = $('#idProducto option:selected').text();
            cantidad = $('#cant').val();
            precio = $('#precio').val();

            if (idProductoT != "" && cantidad != "" && cantidad > 0) {
                subTotal[cont] = (cantidad * precio);
                total = total + subTotal[cont];
                totalFactura = total + costoZona;

                var fila='<tr id="fila'+cont+'"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fa fa-remove" aria-hidden="true"></i></button></td><td><input type="hidden" name="idProductoT[]" value="'+idProductoT+'">'+nombreProducto+'</td><td><input type="hidden" name="cantidadTabla[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="precioTabla[]" value="'+precio+'">'+precio+'</td><td><input type = "hidden" name = "subTotal[]" value = "'+subTotal[cont]+'" >'+subTotal[cont]+'</td> </tr>';

                cont++;

                limpiar();
                $("#stotal").html("Bs." + total);
                $("#total_precio").html("Bs." + totalFactura);//  html porq es un h4
                $("#montoP").val(totalFactura);// val porq es un input

                $("#detalle").append(fila); // sirve para anhadir una fila a los detalles
            }

        }

        function limpiar(){
            $("#cant").val("");
        }

        function eliminar(index){
            total = total - subTotal[index];
            totalFactura = total + costoZona;
            $("#stotal").html("Bs. "+total);
            $("#total_precio").html("Bs. "+totalFactura);
            $("#total_precio").val(totalFactura);

            cont--;

            $("#fila" + index).remove();
            evaluar();
        }

        function evaluar(){
            if (cont > 0) {
                $("#guardar").show();
            }else{
                $("#guardar").hide();
            }
        }

    </script>
    @endpush
@endsection


































