<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTareasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoria_id'); //$table->bigInteger('categoria_id')->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->string('nombre_Tarea');
            $table->date('fecha_Inicio');
            $table->date('fecha_Fin');
            $table->text('descripcion');
            $table->smallInteger('prioridad')->unsigned();
            $table->string('estatus')->default('Por Hacer');
            $table->boolean('terminada')->default(0);
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
        Schema::dropIfExists('tareas');
    }
}
