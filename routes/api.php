<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CategoriaController;


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



Route::get("categorias", [CategoriaController::class, "index"]);
Route::get("productos", [ProductoController::class, "index"]);
Route::get("productos/{producto}", [ProductoController::class, "show"]);


Route::middleware('auth')->group(function() {

	Route::get("carritos/obtener_actual", [CarritoController::class, "obtenerDeUsuario"]);
	Route::post("carritos/agregar_producto/{producto}", [CarritoController::class, "agregarProducto"]);
	Route::delete("carritos/quitar_producto/{producto}", [CarritoController::class, "quitarProducto"]);
	Route::post("carritos/confirmar", [CarritoController::class, "confirmarActual"]);
	Route::delete("carritos/descartar", [CarritoController::class, "descartarActual"]);

});