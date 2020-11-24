<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('productos')->insert([
        	["nombre" => "iPhone 12", "id_categoria" => 1, "imagen" => "", "precio" => 100000],
        	["nombre" => "TV Samsung 52' 4k", "id_categoria" => 2, "imagen" => "", "precio" => 65000],
        	["nombre" => "Lavarropas Drean", "id_categoria" => 3, "imagen" => "", "precio" => 55000],
        ]);
    }
}
