<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->increments('idPedido');
            $table->timestamp('fecha');
            $table->float('montoP');
            $table->string('ciCliente');
            $table->integer('idEstado')->unsigned();
            $table->char('visible');
            $table->timestamps();

            $table->foreign('ciCliente')->references('ciCliente')->on('cliente')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idEstado')->references('idEstado')->on('estado');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido');
    }
}
