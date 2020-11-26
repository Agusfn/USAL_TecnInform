<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;


	protected $guarded = [];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ["img_url"];


    public function categoria()
    {
        return $this->belongsTo("App\Models\Categoria", "id_categoria");
    }


    /**
     * Definimos accesor para luego hacer $product->img_url
     *
     * @return bool
     */
    public function getImgUrlAttribute()
    {
        return Storage::url($this->attributes["imagen"]);
    }
    


    public function borrarImgActual()
    {
		if($this->imagen && Storage::exists($this->imagen)) {
            Storage::delete($this->imagen);
        }
    }


}
