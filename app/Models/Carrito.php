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

}
