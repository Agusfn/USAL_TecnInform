<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.productos.index")->with([
            "productos" => Producto::with("categoria")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.productos.create-update")->with([
            "categorias" => Categoria::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|min:5",
            "id_categoria" => "required|integer|gte:1",
            "imagen" => "required|file",
            "precio" => "required|numeric|gt:0"
        ]);

        $path = $request->file("imagen")->store("productos");

        $producto = new Producto();
        $producto->fill($request->except("imagen"));
        $producto->imagen = $path;
        $producto->save();

        return redirect()->route("productos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view("admin.productos.create-update")->with([
            "producto" => $producto,
            "categorias" => Categoria::all()
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            "nombre" => "required|min:5",
            "id_categoria" => "required|integer|gte:1",
            "imagen" => "nullable|file",
            "precio" => "required|numeric|gt:0"
        ]);

        if($request->has("imagen")) {
            if($producto->imagen) {
                Storage::delete($producto->imagen);
            }
            $path = $request->file("imagen")->store("productos");
            $producto->imagen = $path;
        }

        $producto->fill($request->except("imagen"));
        $producto->save();
        
        return redirect()->route("productos.show", $producto->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
