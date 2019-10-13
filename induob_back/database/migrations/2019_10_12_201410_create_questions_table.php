<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enunciado');
            $table->string('alternativa_A');
            $table->string('alternativa_B');
            $table->string('alternativa_C');
            $table->string('alternativa_D');
            $table->char('correcta',1); //A,B,C,D

            //Foraneas
            $table->bigInteger('module_id')->unsigned();
            $table->foreign('module_id')->references('id')->on('modules');
            
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
        Schema::dropIfExists('questions');
    }
}
