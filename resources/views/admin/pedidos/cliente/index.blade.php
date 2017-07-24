@extends ('admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Gestionar Clientes <a href="{{URL::action('ClienteController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('admin.pedidos.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover table-bordered" >
				<thead>
					<th>CI</th>
					<th>Nombre</th>
					<th>Telefono</th>
					<th>Zona</th>
					<th>Opciones</th>
				</thead>
               @foreach ($cliente as $cli)
				<tr>
					<td>{{ $cli -> ciCliente}}</td>
					<td>{{ $cli -> nombre}}</td>
					<td>{{ $cli -> telefono1}}</td>
					<td>{{ $cli -> zona}}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$cli -> ciCliente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cli -> ciCliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('admin.pedidos.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$cliente -> render()}}
	</div>
</div>

@endsection