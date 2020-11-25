<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




Route::get("productos", [ProductoController::class, "index"]);
Route::get("productos/{producto}", [ProductoController::class, "show"]);


Route::middleware('auth')->group(function() {

	Route::get("carritos/obtener_actual", [CarritoController::class, "obtenerDeUsuario"]);
	Route::get("carritos/agregar_producto/{producto}", [CarritoController::class, "agregarProducto"]);
	Route::get("carritos/quitar_producto/{producto}", [CarritoController::class, "quitarProducto"]);
	Route::get("carritos/confirmar", [CarritoController::class, "confirmarActual"]);
	Route::get("carritos/descartar", [CarritoController::class, "descartarActual"]);

});