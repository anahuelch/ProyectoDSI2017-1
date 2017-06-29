<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConveniosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenios', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_tipo')->unsigned();
            $table->integer('id_estado')->unsigned();
            $table->integer('id_area')->unsigned();
            $table->integer('id_coordinador')->unsigned();
            $table->string('nombre_convenio');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('descripcion_convenio');

            $table->timestamps();

            $table->foreign('id_tipo')->references('id')->on('tipos');
            $table->foreign('id_estado')->references('id')->on('estados');
            $table->foreign('id_area')->references('id')->on('areas');
            $table->foreign('id_coordinador')->references('id')->on('coordinadores');
        });

        //TABLA PIVOTE ENTRE CONVENIO E INSTITUCION
        Schema::create('convenio_institucion', function(Blueprint $table){
            $table->integer('id_convenio')->unsigned();
            $table->integer('id_institucion')->unsigned();

            $table->foreign('id_convenio')->references('id')->on('convenios');
            $table->foreign('id_institucion')->references('id')->on('instituciones');

            $table->timestamps();
        });

        //TABLA PIVOTE ENTRE CONVENIO Y ACTIVIDAD
        Schema::create('convenio_actividad', function(Blueprint $table){
            $table->integer('id_convenio')->unsigned();
            $table->integer('id_actividad')->unsigned();

            $table->foreign('id_convenio')->references('id')->on('convenios');
            $table->foreign('id_actividad')->references('id')->on('actividades');

            $table->timestamps();
        });

        //TABLA PIVOTE ENTRE CONVENIO Y OBJETIVO
        Schema::create('convenio_objetivo', function(Blueprint $table){
            $table->integer('id_convenio')->unsigned();
            $table->integer('id_objetivo')->unsigned();

            $table->foreign('id_convenio')->references('id')->on('convenios');
            $table->foreign('id_objetivo')->references('id')->on('objetivos');

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
        Schema::drop('convenios');
    }
}
