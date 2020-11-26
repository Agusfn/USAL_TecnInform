@extends('admin.layouts.main')

@section('title', 'Categorías')


@section('content')

					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Categorías</h3>
						</div>
						<div class="panel-body">

							<table class="table">
								<thead>
									<tr>
										<th>Id</th>
										<th>Nombre</th>
									</tr>
								</thead>
								<tbody>
									@if($categorias->count() > 0)
										@foreach($categorias as $categoria)
										<tr>
											<td>{{ $categoria->id }}</td>
											<td>{{ $categoria->nombre }}</td>
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
