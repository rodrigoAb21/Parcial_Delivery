@extends('admin')
@section('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		
<h3>Administrar Pedidos<a href="{{URL::action('PedidoController@create')}}"> <button class="btn btn-success">Nuevo</button></a></h3>
@include('admin.pedidos.pedido.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-13 col-md-11 col-sm-11 col-xs-13">
		<div class="table-responsive">
			<table class="table table-striped table-hover table-bordered" >
				<thead>
					<th style="text-align: center">Codigo</th>
					<th style="text-align: center">Fecha</th>
					<th>Estado</th>
					<th>Cliente</th>
					<th style="text-align: center">Monto Total</th>
					<th style="text-align: center">Opciones</th>
				</thead>
               @foreach ($pedido as $ped)
				<tr >
					<td style="text-align: center">{{$ped -> idPedido}}</td>
					<td style="text-align: center">{{$ped -> fecha}}</td>
					<td>{{$ped -> cliente}}</td>
					<td style="text-align: center">{{$ped -> montoP}}</td>
					<td><h4><span class="label label-primary pull-top">{{ $ped -> estado}}</span></h4></td>
					<td style="text-align: center">
						<a href="{{URL::action('PedidoController@edit',$ped -> idPedido)}}"><button class="btn btn-info"><i class="fa fa-pencil"></i></button></a>
						<a href="{{URL::action('PedidoController@show',$ped -> idPedido)}}"><button class="btn btn-primary"><i class="fa fa-eye"></i></button></a>
					</td>
				</tr>
			
				@endforeach
			</table>
		</div>
		{{$pedido->render()}}
	</div>
</div>
@endsection