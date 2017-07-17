@extends ('admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Gestionar Tipos <a href="{{URL::action('TipoController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('admin.pedidos.tipo.search')
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
               @foreach ($tipo as $tip)
				<tr>
					<td>{{ $tip->idTipo}}</td>
					<td>{{ $tip->nombre}}</td>
					<td>
						<a href="{{URL::action('TipoController@edit',$tip->idTipo)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$tip->idTipo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('admin.pedidos.tipo.modal')
				@endforeach
			</table>
		</div>
		{{$tipo->render()}}
	</div>
</div>

@endsection