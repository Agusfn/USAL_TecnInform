<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
	protected $guarded = [];


    public function categoria()
    {
        return $this->belongsTo("App\Models\Categoria", "id_categoria");
    }


    public function imgUrl()
    {
    	return Storage::url($this->imagen);
    }


}
