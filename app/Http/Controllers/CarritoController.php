<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Carrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CarritoController extends Controller
{
	
	/**
	 * Obtener el último carrito activo del usuario.
	 */
	public function obtenerDeUsuario()
	{	
		$carrito = Auth::user()->obtenerCarritoActivo();
		if($carrito) {
			return $carrito->arrayParaJs();
		} else {
			return null;
		}
		
	}


	/**
	 * Agregar un producto al carrito del usuario
	 * @param  Producto $producto [description]
	 * @return [type]             [description]
	 */
	public function agregarProducto(Producto $producto)
	{
		$user = Auth::user();
		
		$carrito = $user->obtenerCarritoActivo();
		Log::debug($carrito);
		if(!$carrito) {
			$carrito = Carrito::create(["id_usuario" => $user->id]);
		}

		$carrito->agregarItem($producto);
		return $carrito->arrayParaJs();
	}


	/**
	 * Remover una unidad de un producto del carrito.
	 * @param  Producto $producto [description]
	 * @return [type]             [description]
	 */
	public function quitarProducto(Producto $producto)
	{
		if($carrito = Auth::user()->obtenerCarritoActivo()) {
			$carrito->removerProducto($producto);
			return $carrito->arrayParaJs();
		}
	}


	/**
	 * Confirmar carrito
	 * @return [type] [description]
	 */
	public function confirmarActual()
	{
		if($carrito = Auth::user()->obtenerCarritoActivo()) {
			$carrito->confirmar();
		}
	}


	/**
	 * Descartar carrito
	 * @return [type] [description]
	 */
	public function descartarActual()
	{
		if($carrito = Auth::user()->obtenerCarritoActivo()) {
			$carrito->items()->delete();
			$carrito->delete();
		}
	}



}
