<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->increments('idFactura');
            $table->string('codigo');
            $table->string('nombre');
            $table->timestamp('fecha');
            $table->string('nit');
            $table->char('estado');
            $table->float('montoF');
            $table->integer('idPedido')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('factura');
    }
}
