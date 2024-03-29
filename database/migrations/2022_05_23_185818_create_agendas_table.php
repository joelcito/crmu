<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creador_id')->nullable();
            $table->foreign('creador_id')->references('id')->on('users');
            $table->unsignedBigInteger('modificador_id')->nullable();
            $table->foreign('modificador_id')->references('id')->on('users');
            $table->unsignedBigInteger('eliminador_id')->nullable();
            $table->foreign('eliminador_id')->references('id')->on('users');
            $table->unsignedBigInteger('tipo_agenda_id')->nullable();
            $table->foreign('tipo_agenda_id')->references('id')->on('tipo_agendas');
            $table->unsignedBigInteger('prioridad_id')->nullable();
            $table->foreign('prioridad_id')->references('id')->on('prioridades');
            $table->string('titulo')->nullable();
            $table->datetime('inicio')->nullable();
            $table->datetime('fin')->nullable();
            $table->text('texto')->nullable();
            $table->string('todoDia')->nullable();
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
            $table->datetime('deleted_at')->nullable();
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
        Schema::dropIfExists('agendas');
    }
}
