@extends ('admin')
@section ('contenido')



<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Gestionar Productos <a href="{{URL::action('ProductoController@create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('pedidos.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-condensed table-hover table-bordered" >
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Imagen</th>
					<th>Opciones</th>
				</thead>
               @foreach ($producto as $prod)
				<tr>
					<td>{{ $prod -> idProducto}}</td>
					<td>{{ $prod -> nombre}}</td>
					<td>{{ $prod -> precio}}</td>
					<td>
						<img src="{{asset('img/productos/'.$prod -> imagen)}}" alt="{{$prod -> nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$prod -> idProducto)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$prod -> idProducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('pedidos.producto.modal')
				@endforeach
			</table>
		</div>
		{{$producto -> render()}}
	</div>
</div>

@endsection