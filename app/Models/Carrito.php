<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
use App\Models\ItemCarrito;

class Carrito extends Model
{



    const ESTADO_EN_PROCESO = "en_proceso";
    const ESTADO_FINALIZADO = "finalizado";

    protected $guarded = [];

    // defaults
    protected $attributes = [
        'estado' => self::ESTADO_EN_PROCESO,
        'total' => 0,
    ];

    /**
     * Get the user that owns the cart.
     */
    public function usuario()
    {
        return $this->belongsTo("App\Models\User", "id_usuario");
    }

    public function items()
    {
        return $this->hasMany("App\Models\ItemCarrito", "id_carrito");
    }

    public function scopeEnProceso($query)
    {
        return $query->where('estado', self::ESTADO_EN_PROCESO);
    }

    public function scopeMasReciente($query)
    {
        return $query->orderBy("id", "desc");
    }


    public function agregarItem(Producto $producto) 
    {

        $existingItem = $this->items()->where("id_producto", $producto->id)->first();
        if ($existingItem) {
            $existingItem->cantidad += 1;
            $existingItem->total += $producto->precio;
            $existingItem->save();
        }
        else {
            ItemCarrito::create([
                "id_carrito" => $this->id,
                "id_producto" => $producto->id,
                "precio_unitario" => $producto->precio,
                "cantidad" => 1,
                "total" => $producto->precio
            ]);
        }

        $this->total += $producto->precio;
        $this->save();
    }


    /**
     * Remover un producto individual del carrito.
     * @param  Producto $producto [description]
     * @return [type]             [description]
     */
    public function removerProducto(Producto $producto) 
    {

        $existingItem = $this->items()->where("id_producto", $producto->id)->first();

        if ($existingItem) {

            $itemPrice = $existingItem->precio_unitario;

            if($existingItem->cantidad > 1) {
                $existingItem->cantidad -= 1;
                $existingItem->total -= $itemPrice;
                $existingItem->save();
            } else {
                $existingItem->delete();
            }

            $this->total -= $itemPrice;
            $this->save();
        }
    }


    /**
     * Devolver un array asociativo con los datos minimo necesarios del carrito, con una lista de items compactos (sin mayores niveles de anidacion), 
     * usados en la lista de items de la app js front end 
     * @return array
     */
    public function arrayParaJs()
    {
        $items = $this->items()->with("producto")->get();

        $compactItems = [];
        foreach($items as $item) 
        {
            $compactItems[] = [
                "id_producto" => $item->id_producto,
                "nombre_producto" => $item->producto->nombre,
                "imagen_producto" => $item->producto->imagen,
                "precio_unitario" => floatval($item->precio_unitario),
                "cantidad" => $item->cantidad,
                "total" => floatval($item->total)
            ];
        }

        $compactCart = [
            "id_usuario" => $this->id_usuario,
            "estado" => $this->estado,
            "items" => $compactItems,
            "total" => floatval($this->total)
        ];

        return $compactCart;
    }



    public function confirmar()
    {
        $this->estado = self::ESTADO_FINALIZADO;
        $this->save();
    }



}
