<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
        	["rol" => "admin", "nombre" => "Agustin FN", "email" => "agusfn20@gmail.com", "password" => bcrypt('20596')],
        	["rol" => "user", "nombre" => "Juancito", "email" => "juancito@mail.com", "password" => bcrypt('123456')],
        ]);
    }
}
