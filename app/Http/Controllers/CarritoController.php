<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
	
	/**
	 * Obtener el último carrito activo del usuario.
	 */
	public function obtenerDeUsuario()
	{
		return Auth::user()->carritoActivo();
	}


	public function agregarProducto(Producto $producto)
	{
		$user = Auth::user();
		
		if(!$carrito = $user->carritoActivo()) {
			$carrito = Carrito::create(["id_usuario" => $user->id]);
		}

		$carrito->agregarItem($producto);
	}


	public function quitarProducto(Producto $producto)
	{
		if($carrito = Auth::user()->carritoActivo()) {
			// quitar item del carrito
		}
	}


	public function confirmarActual()
	{
		if($carrito = Auth::user()->carritoActivo()) {
			// confirmar carrito
		}
	}


	public function descartarActual()
	{
		if($carrito = Auth::user()->carritoActivo()) {
			// descartar carrito
		}
	}



}
