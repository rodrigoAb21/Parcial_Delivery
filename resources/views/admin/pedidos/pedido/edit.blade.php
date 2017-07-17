@extends ('admin')
@section ('contenido')
		<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Caso de Uso: {{$pedido->nombre}}</h3>
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

			{!!Form::model($pedido,['method'=>'PATCH','route'=>['pedido.update',$pedido->idPed]])!!}
            {{Form::token()}}
				 <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Monto Total</label>
                <input id="montoTotal" type="text" name="montoTotal" class="form-control" value="{{$pedido -> montoTotal}}">
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Costo de Envio</label>
                <input id="costoEnvio" type="text" name="costoEnvio" class="form-control" value="{{$pedido -> costoEnvio}}">
            </div>
        </div>

    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<div class="form-group">
    			<label>Cliente</label>
    			<select name="idCliente" class="form-control">
					@foreach ($cliente as $cli)
    					@if ($cli -> idCliente == $pedido -> idCliente)
    				   <option value="{{$cli -> idCliente}}" selected>{{$cli -> nombre}}</option>	 
    				   @else
    				   <option value="{{$cli -> idCliente}}">{{$cli -> nombre}}</option>	 
    				   @endif
    				@endforeach
    			</select>
    		</div>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="idEstado" class="form-control">
                    @foreach ($estado as $est)
    					@if ($est -> idEstado == $pedido -> idEstado)
    				   <option value="{{$est -> idEstado}}" selected>{{$est -> nombre}}</option>	 
    				   @else
    				   <option value="{{$est -> idEstado}}">{{$est -> nombre}}</option>	 
    				   @endif
    				@endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Zona</label>
                <select id="idZona"  name="idZona"  class="form-control"  data-size="6">
                    @foreach ($zona as $zon)
    					@if ($zon -> idZona == $pedido -> idZona)
    				   <option value="{{$zon -> idZona}}" selected>{{$zon -> nombre}}</option>	 
    				   @else
    				   <option value="{{$zon -> idZona}}">{{$zon -> nombre}}</option>	 
    				   @endif
    				@endforeach
                </select>
                <input type="hidden" id="idZon" name="idZon" value="">
            </div>
        </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
                <label>Tiempo Total</label>
                <input type="text" id="tiempoTotal" name="tiempoTotal" class="form-control" value="{{$pedido -> tiempo}}">
            </div>
        </div>
    </div>       
	            <div class="form-group">
	            	<button class="btn btn-primary" type="submit">Guardar</button>
	            	<button class="btn btn-danger" type="reset">Cancelar</button>
	            </div>

			{!!Form::close()!!}		
@endsection