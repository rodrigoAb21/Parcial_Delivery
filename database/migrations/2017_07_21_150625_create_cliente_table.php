<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->string('ci');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('referencia');
            $table->string('telefono1');
            $table->string('telefono2')->nullable();
            $table->date('nacimiento');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('visible');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('idZona')->unsigned();

            $table->primary('ci');
            $table->foreign('idZona')->references('idZona')->on('zona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
