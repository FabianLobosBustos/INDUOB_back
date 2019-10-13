<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->dateTime('fecha_consulta'); 
            //el completado podria ser un boolean!!! (al terminar la prueba se completa?)
            $table->double('completado'); //Porcentaje de completitud del modulo (pensar)
            $table->boolean('consultado');

            //Foraneas
            $table->bigInteger('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
   
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
        Schema::dropIfExists('module_user');
    }
}
