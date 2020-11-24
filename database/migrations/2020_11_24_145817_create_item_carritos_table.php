<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items_carrito', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_carrito");
            $table->foreignId("id_producto");
            $table->decimal("precio_unitario", 10, 2);
            $table->integer("cantidad");
            $table->decimal("total", 10, 2);
            $table->timestamps();

            $table->foreign('id_carrito')->references('id')->on('carritos');
            $table->foreign('id_producto')->references('id')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_carrito');
    }
}
