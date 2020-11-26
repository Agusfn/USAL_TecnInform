<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\CategoriaController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// Home js app route
Route::get('/', [HomeController::class, 'index'])->name('home');


// Admin panel routes
Route::prefix('admin')->middleware(["auth", "isAdmin"])->group(function() {

	Route::redirect('/', 'admin/productos');
	Route::resource('productos', ProductoController::class);

	Route::get("usuarios", [UsuarioController::class, "index"])->name("usuarios.index");
	Route::get("usuarios/{id}", [UsuarioController::class, "show"])->name("usuarios.show");

	Route::get("categorias", [CategoriaController::class, "index"])->name("categorias.index");

});