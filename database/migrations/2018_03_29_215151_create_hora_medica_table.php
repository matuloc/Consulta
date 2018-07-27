<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoraMedicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hora_medica', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dia');
            $table->time('hora');
            $table->string('rut');
            $table->string('nombre');
            $table->string('id_paciente');
            $table->integer('id_especialidad');
            $table->integer('id_prevision');
            $table->integer('estado');
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
        Schema::dropIfExists('hora_medica');
    }
}
