@extends('admin.layouts.main')


@if(!isset($producto))
	@section('title', 'Agregar producto')
@else
	@section('title', $producto->nombre)
@endif


@section('custom-css')
	<link href="{{ asset('resources/admin/vendor/dropzone/min/dropzone.min.css') }}" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{ asset('resources/admin/vendor/jquery-ui-1.12.1.custom/jquery-ui.min.css') }}">

	<style type="text/css">
	.dz-image img {
		width: 100%;
		height: 100%
	}
	.dropzone .dz-preview:hover .dz-image img {
	  -webkit-filter: blur(0px);
	  filter: blur(0px); 
	}
	.dz-details {
		display: none;
	}
	</style>
@endsection

@section('content')

					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}">Usuarios</a></li>
							<li class="breadcrumb-item active" aria-current="page">{{ $usuario->nombre }}</li>
						</ol>
					</nav>

					<div class="row">
						<div class="col-md-4">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Datos del usuario</h3>
								</div>
								<div class="panel-body">

									<div class="form-group">
										<label>Nombre</label><br/>
										{{ $usuario->nombre }}
									</div>
									<div class="form-group">
										<label>Rol</label><br/>
										{{ $usuario->esAdmin() ? "Admin" : "Usuario común" }}
									</div>
									<div class="form-group">
										<label>Email</label><br/>
										{{ $usuario->email }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-headline">
								<div class="panel-heading">
									<h3 class="panel-title">Carritos</h3>
								</div>
								<div class="panel-body">

									@if($usuario->carritos->count() > 0)
										@foreach($usuario->carritos->sortByDesc('id') as $carrito)

										<h3>Carrito #{{ $carrito->id }}</h3>
										<div>Fecha: {{ $carrito->created_at->format('d/m/Y') }}</div>
										<div style="margin: 10px 0">Estado: 
											@if($carrito->estaFinalizado()) 
												<span class="label label-success" style="font-size: 15px">Finalizado</span> 
											@else 
												<span class="label label-default" style="font-size: 15px">En proceso</span>
											@endif
										</div>
										<table class="table">
											<thead>
												<tr>
													<th>Item</th>
													<th>Precio unit.</th>
													<th>Cantidad</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
												@foreach($carrito->items as $item)
												<tr>
													<td>{{ $item->producto->nombre }}</td>
													<td>${{ $item->precio_unitario }}</td>
													<td>x{{ $item->cantidad }}</td>
													<td>${{ $item->total }}</td>
												</tr>
												@endforeach
												
											</tbody>
										</table>

										@endforeach
									@else
										<h4 style="text-align: center;">Este usuario no posee carritos.</h4>
									@endif

									
								</div>
							</div>
						</div>
					</div>

					
@endsection


@section('custom-js')

	<script type="text/javascript">
	var app_url = "{{ config('app.url') }}";

	$(document).ready(function() {



	});
	</script>

@endsection