<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuesta_combos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creador_id')->nullable();
            $table->foreign('creador_id')->references('id')->on('users');
            $table->unsignedBigInteger('modificador_id')->nullable();
            $table->foreign('modificador_id')->references('id')->on('users');
            $table->unsignedBigInteger('eliminador_id')->nullable();
            $table->foreign('eliminador_id')->references('id')->on('users');
            $table->unsignedBigInteger('respuesta_id')->nullable();
            $table->foreign('respuesta_id')->references('id')->on('respuestas');

            // para las respuestas combos
            $table->unsignedBigInteger('valor_combo_id')->nullable();
            $table->foreign('valor_combo_id')->references('id')->on('valor_combos');

            $table->text('respuesta')->nullable();
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
        Schema::dropIfExists('respuesta_combos');
    }
}
