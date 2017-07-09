<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->increments('idDetalle');
            $table->integer('idProducto')->unsigned();
            $table->integer('idPedido')->unsigned();
            $table->integer('cantidad');
            $table->float('montoD');
            $table->timestamps();

            $table->foreign('idProducto')->references('idProducto')->on('producto');
            $table->foreign('idPedido')->references('idPedido')->on('pedido');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle');
    }
}
