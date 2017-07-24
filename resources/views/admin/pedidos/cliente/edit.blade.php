@extends ('admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<h3>Editar Cliente: {{$cliente->nombre}}</h3>
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
{!!Form::model($cliente,['method'=>'PATCH','autocomplete'=>'off','route'=>['cliente.update',$cliente->ciCliente]])!!}
{{Form::token()}}
<div class="row">

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="cicliente">Carnet de Identidad</label>
			<input type="text" name="ciCliente" class="form-control" value="{{$cliente->ciCliente}}" required  >
		</div>
	</div>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{$cliente->nombre}}"  required >
		 </div>
	</div>

</div>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="direccion">Direccion</label>
			<input type="text" name="direccion" class="form-control" value="{{$cliente->direccion}}" required >
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label>Zona</label>
			<select name="idZona" class="form-control">
				@foreach ($zona as $zon)
					@if ($zon -> idZona == $cliente -> idZona)
						<option value="{{$zon -> idZona}}" selected>{{$zon -> nombre}}</option>
					@else
						<option value="{{$zon -> idZona}}">{{$zon -> nombre}}</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="referencia">Referencia</label>
			<textarea name="referencia" class="form-control" required >{{$cliente->referencia}}</textarea>
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="telefono1">Telefono 1</label>
			<input type="number" minlength="7" maxlength="8" name="telefono1" class="form-control" value="{{$cliente->telefono1}}"  required >
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="telefono2">Telefono 2</label>
			<input type="number" minlength="7" maxlength="8" name="telefono2" class="form-control" value="{{$cliente->telefono2}}" required >
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="nacimiento">Nacimiento</label>
			<input type="date" name="nacimiento" class="form-control" value="{{$cliente->nacimiento}}" required >
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" name="email" class="form-control" value="{{$cliente->email}}"  required >
		</div>
	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<div class="form-group">
			<label for="password">Contraseña</label>
			<input type="password" name="password" class="form-control"  required >
		</div>
	</div>
</div>


<div class="row">
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