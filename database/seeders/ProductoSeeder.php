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
        	["nombre" => "Smart Band Noga Watch", "id_categoria" => 4, "imagen" => "productos/PUfh1E9lzNvgvB8fI0shLxBLo8s3N883C3nQYnxp.png", "precio" => 1149],
        	["nombre" => "Google Chromecast 3rd Generation", "id_categoria" => 5, "imagen" => "productos/EKUfxHlWbgi8UlYzL8mtrB5zuYbMMM9iN5Hsrcqj.png", "precio" => 5330],
        	["nombre" => "Xiaomi Mi TV Stick MDZ-24-AA", "id_categoria" => 5, "imagen" => "productos/IxJGzlfOPnEPQODM44UAfm92w7stNAb1IhH0TX9m.png", "precio" => 5799],
            ["nombre" => "Samsung Galaxy A11 64 GB", "id_categoria" => 1, "imagen" => "productos/88ouZJrJcjVuq41aJKvPD1R9WVI5kOIPPvBWkOxE.png", "precio" => 21999],
            ["nombre" => "Xiaomi Redmi Note 9", "id_categoria" => 1, "imagen" => "productos/TiS1iqu3gd2Y3mKBkBJg24igKlv4L1lNGYtKSnOU.png", "precio" => 36999],
            ["nombre" => "Samsung Galaxy Tab A 2019 SM-T510", "id_categoria" => 2, "imagen" => "productos/TXcBHfTwbv4chc3NP2PmtD57RQiPsQAcjWbG9RAF.png", "precio" => 24999],
            ["nombre" => "Smart TV BGH B3219H5 LED HD 32", "id_categoria" => 3, "imagen" => "productos/QsckSjK3ATOHQdQgHJFhnjyecUNE5Sx9cNfAsPL8.png", "precio" => 22990],
            ["nombre" => "Smart TV Philco PLD32HS9B LED HD 32", "id_categoria" => 3, "imagen" => "productos/gjPHF6C1WHZq6sB5aaYHZEAwa7ZoLLXE5E7g0kbF.png", "precio" => 23999],
            ["nombre" => "Lenovo I3 8130u 4gb 1tb 15.6", "id_categoria" => 6, "imagen" => "productos/7Mqzb8GffpTT3Isz4C3E58taYHDaACKH2Qijyu20.png", "precio" => 65999],
            ["nombre" => "Exo Smart E19 Intel Celeron", "id_categoria" => 6, "imagen" => "productos/NaXE6OAUsqPS7RX6Fy0GbELgyNsRzQIOOCul3SKG.png", "precio" => 39999],
            ["nombre" => "Intel Cloudbook 4gb 64gb", "id_categoria" => 6, "imagen" => "productos/NKEViuerlL7JsnwBxxLp6zKeLHc772xnb2f6CA8q.png", "precio" => 37468]
        ]);
    }
}
