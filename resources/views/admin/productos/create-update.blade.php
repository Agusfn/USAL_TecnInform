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
							<li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos</a></li>
							@if(isset($producto))
							<li class="breadcrumb-item active" aria-current="page">{{ $producto->nombre }}</li>
							@else
							<li class="breadcrumb-item active" aria-current="page">Agregar producto</li>
							@endif
						</ol>
					</nav>

					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-headline">
								<div class="panel-heading">
									@if(isset($producto))
									<h3 class="panel-title">
										Modificar producto
										<div class="btn-group" style="float:right">
											<form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline-block;">
												@csrf
												<button type="button" class="btn btn-danger" onclick="if(confirm('¿Eliminar producto?')) $(this).parent().submit();">Eliminar producto</button>
											</form>
										</div>
									</h3>
									@else
									<h3 class="panel-title">Agregar nuevo producto</h3>
									@endif
								</div>
								<div class="panel-body">

									@if(isset($producto))
									<form action="{{ route('productos.update', $producto->id) }}" enctype='multipart/form-data' method="POST" id="product_form">
									@method('put')
									@else
									<form action="{{ route('productos.store') }}" method="POST" enctype='multipart/form-data' id="product_form">
									@endif
										@csrf

										<div class="form-group @error('nombre') has-error @enderror">
											<label>Nombre del producto</label>
											<input type="text" class="form-control" name="nombre" value="{{ old('nombre') ?: ($producto->nombre ?? '') }}">
			                                @error('nombre')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

										<div class="form-group @error('id_categoria') has-error @enderror">

											<label>Categoría</label>
											<select class="form-control" name="id_categoria" autocomplete="off">
												<option value="-1" selected>Seleccionar</option>
												@foreach($categorias as $categoria)
													<option value="{{ $categoria->id }}" 
														@if(old('id_categoria') == $categoria->id)
															selected
														@elseif(isset($producto) && $producto->id_categoria == $categoria->id)
															selected
														@endif
														>
														{{ $categoria->nombre }}
													</option>
												@endforeach
											</select>

			                                @error('category_id')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

										<div class="form-group @error('imagen') has-error @enderror">
											<label>Imágen</label>
											@if(isset($producto) && $producto->imagen)
											<div id="product-img" style="margin-bottom: 15px">
												<img src="{{ $producto->imgUrl() }}" style="max-width: 100%; margin-bottom: 10px" />
												<button type="button" class="btn btn-sm btn-secondary" onclick="$('#product-img').hide();$('#img-input').show()">Cambiar imagen</button>
											</div>
											@endif
											<input type="file" name="imagen" id="img-input" @if(isset($producto) && $producto->imagen) style="display:none" @endif />
			                                @error('imagen')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

										<div class="form-group @error('precio') has-error @enderror">
											<label>Precio</label>
											<input type="text" class="form-control" name="precio" value="{{ old('precio') ?: ($producto->precio ?? '') }}">
			                                @error('precio')
			                                    <span class="help-block">{{ $message }}</span>
			                                @enderror
										</div>

									</form>

									<div style="text-align: right; margin-top: 30px">
										<button class="btn btn-primary" onclick="$('#product_form').submit()">@if(isset($producto)) Modificar producto @else Agregar producto @endif</button>
									</div>

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