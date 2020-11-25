<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCarrito extends Model
{

	protected $table = 'items_carrito';

	protected $guarded = [];


    // defaults
    protected $attributes = [
        'cantidad' => 1
    ];

    public function carrito()
    {
        return $this->belongsTo("App\Models\Carrito", "id_carrito");
    }

    public function producto()
    {
        return $this->belongsTo("App\Models\Producto", "id_producto");
    }
    


}
