<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creador_id')->nullable();
            $table->foreign('creador_id')->references('id')->on('users');
            $table->unsignedBigInteger('modificador_id')->nullable();
            $table->foreign('modificador_id')->references('id')->on('users');
            $table->unsignedBigInteger('eliminador_id')->nullable();
            $table->foreign('eliminador_id')->references('id')->on('users');
            $table->unsignedBigInteger('vendedor_id')->nullable();
            $table->foreign('vendedor_id')->references('id')->on('vendedores');
            $table->unsignedBigInteger('oportunidad_id')->nullable();
            $table->foreign('oportunidad_id')->references('id')->on('oportunidades');
            $table->unsignedBigInteger('estado_final_id')->nullable();
            $table->foreign('estado_final_id')->references('id')->on('estado_finales');
            $table->datetime('fecha_asignacion')->nullable();
            $table->integer('dias_asignacion')->nullable();
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
        Schema::dropIfExists('asignaciones');
    }
}
