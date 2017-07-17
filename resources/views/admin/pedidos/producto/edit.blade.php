@extends ('admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{$producto->nombre}}</h3>
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
			{!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->idProducto], 'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
	        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	        		<div class="form-group">
	            	<label for="nombre">Nombre</label>
	            	<input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" placeholder="Nombre...">
	            </div>
        	</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	        	<div class="form-group">
	            	<label for="precio">Precio</label>
	            	<input type="text" min="0" name="precio" class="form-control" value="{{$producto -> precio}}" placeholder="Precio...">
	            </div>
        	</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label>Tipo</label>
					<select name="idTipo" class="form-control">
						@foreach ($tipo as $tip)
							@if ($tip -> idTipo == $producto -> idTipo)
								<option value="{{$tip -> idUnidad}}" selected>{{$tip -> nombre}}</option>
							@else
								<option value="{{$tip -> idUnidad}}">{{$tip -> nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="imagen">Imagen</label>
					<input type="file" name="imagen" class="form-control">
				</div>
				@if (($producto -> imagen)!="")
					<img src="{{asset('img/productos/'.$producto -> imagen)}}" height="150px" width="150px" class="img-thumbnail" >
				@endif

			</div>

        	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label for="descripcion">Descripcion</label>
					<textarea name="descripcion" class="form-control">{{$producto -> descripcion}}</textarea>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<br>
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
            

    </div>

			{!!Form::close()!!}		

@endsection