<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoordinadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinadores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rut_coordinador')->unique();
            $table->string('nombre_coordinador');
            $table->string('sexo_coordinador');
            $table->string('fono_coordinador');
            $table->string('correo_coordinador');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coordinadores');
    }
}
