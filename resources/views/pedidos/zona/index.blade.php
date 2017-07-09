@extends ('index')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Gestionar Zonas <a href="{{URL::action('ZonaController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('pedidos.zona.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover table-bordered">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Costo</th>
					<th>Opciones</th>
				</thead>
               @foreach ($zona as $zon)
				<tr>
					<td>{{ $zon->idZona}}</td>
					<td>{{ $zon->nombre}}</td>
					<td>{{ $zon->costo}}</td>
					<td>
						<a href="{{URL::action('ZonaController@edit',$zon->idZona)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$zon->idZona}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('pedidos.zona.modal')
				@endforeach
			</table>
		</div>
		{{$zona->render()}}
	</div>
</div>

@endsection