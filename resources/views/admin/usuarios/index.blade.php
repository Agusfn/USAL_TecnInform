@extends('admin.layouts.main')

@section('title', 'Usuarios')


@section('custom-css')
	<style type="text/css">
		.product-table > tbody > tr > td {
			vertical-align: middle;
		}
	</style>
@endsection


@section('content')

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Usuarios</h3>
						</div>
						<div class="panel-body">

							<table class="table product-table">
								<thead>
									<tr>
										<th><!-- Ver mas --></th>
										<th><!--Foto--></th>
										<th>Rol</th>
										<th>Nombre</th>
										<th>E-mail</th>
										<th>Carritos</th>
									</tr>
								</thead>
								<tbody>
									@if($usuarios->count() > 0)
										@foreach($usuarios as $usuario)
										<tr>
											<td><a class="btn btn-primary" href="{{ route('usuarios.show', $usuario->id) }}"><i class="fa fa-search-plus" aria-hidden="true"></i></a></td>
											<td><img class="product-img" src="{{ $usuario->img_url }}"></td>
											<td>{{ $usuario->esAdmin() ? "Admin" : "Usuario comun" }}</td>
											<td>{{ $usuario->nombre }}</td>
											<td>{{ $usuario->email }}</td>
											<td>{{ $usuario->carritos()->count() }}</td>
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