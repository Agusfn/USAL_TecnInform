<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
	protected $guarded = [];


    public function productos()
    {
        return $this->hasMany("App\Models\Producto", "id_categoria");
    }

}
