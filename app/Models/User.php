<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function carritos()
    {
        return $this->hasMany("App\Models\Carrito", "id_usuario");
    }


    public function obtenerCarritoActivo()
    {
        $carritoQuery = $this->carritos()->enProceso()->masReciente();
        if($carritoQuery->count() >= 1) {
            return $carritoQuery->with("items")->first();
        } else {
            return null;
        }
    }


}
