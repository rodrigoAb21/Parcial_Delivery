<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->string('ci');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('direccion');
            $table->string('telefono1');
            $table->date('nacimiento');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('visible');
            $table->rememberToken();
            $table->timestamps();

            $table->primary('ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
