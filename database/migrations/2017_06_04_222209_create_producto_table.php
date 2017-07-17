<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->increments('idProducto');
            $table->integer('idTipo')->unsigned();
            $table->string('nombre');
            $table->string('imagen');
            $table->float('precio');
            $table->string('descripcion');
            $table->char('visible');
            $table->timestamps();

            $table->foreign('idTipo')->references('idTipo')->on('tipo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
