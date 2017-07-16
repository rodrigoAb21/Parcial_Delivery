@extends ('admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Gestionar Estados <a href="{{URL::action('EstadoController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('pedidos.estado.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover table-bordered">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Opciones</th>
				</thead>
               @foreach ($estado as $est)
				<tr>
					<td>{{ $est->idEstado}}</td>
					<td>{{ $est->nombre}}</td>
					<td>
						<a href="{{URL::action('EstadoController@edit',$est->idEstado)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$est->idEstado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('pedidos.estado.modal')
				@endforeach
			</table>
		</div>
		{{$estado->render()}}
	</div>
</div>

@endsection