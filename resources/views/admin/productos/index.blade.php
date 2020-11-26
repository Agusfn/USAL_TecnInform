@extends('admin.layouts.main')

@section('title', 'Productos')


@section('custom-css')
	<style type="text/css">
		.product-table > tbody > tr > td {
			vertical-align: middle;
		}
		.product-img {
			width: 100px;
			height: 100px;
			object-fit: cover;
		    padding: 1px;
		    background-color: #BBB;
		}
	</style>
@endsection


@section('content')

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Productos
								<div class="btn-group" style="float:right">
									<a href="{{ route('productos.create') }}" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Agregar producto</a>
								</div>
							</h3>
						</div>
						<div class="panel-body">

							<table class="table product-table">
								<thead>
									<tr>
										<th><!-- Ver mas --></th>
										<th><!--Foto--></th>
										<th>Nombre</th>
										<th>Categoria</th>
										<th>Precio</th>
									</tr>
								</thead>
								<tbody>
									@if($productos->count() > 0)
										@foreach($productos as $producto)
										<tr>
											<td><a class="btn btn-primary" href="{{ route('productos.show', $producto->id) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
											<td><img class="product-img" src="{{ $producto->img_url }}"></td>
											<td>{{ $producto->nombre }}</td>
											<td>{{ $producto->categoria->nombre }}</td>
											<td>${{ $producto->precio }}</td>
											<td></td>
										</tr>
										@endforeach
									@else
										<tr><td colspan="6" style="text-align: center;">No se encontraron resultados</td></tr>
									@endif
								</tbody>
							</table>

						</div>
					</div>
@endsection


@section('custom-js')

@endsection