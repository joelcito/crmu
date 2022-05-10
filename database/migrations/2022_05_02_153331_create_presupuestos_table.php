<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresupuestosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presupuestos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creador_id')->nullable();
            $table->foreign('creador_id')->references('id')->on('users');
            $table->unsignedBigInteger('modificador_id')->nullable();
            $table->foreign('modificador_id')->references('id')->on('users');
            $table->unsignedBigInteger('eliminador_id')->nullable();
            $table->foreign('eliminador_id')->references('id')->on('users');
            $table->unsignedBigInteger('campania_id')->nullable();
            $table->foreign('campania_id')->references('id')->on('campanias');
            $table->unsignedBigInteger('gasto_id')->nullable();
            $table->foreign('gasto_id')->references('id')->on('gastos');
            $table->decimal('ingreso',12,2)->nullable();
            $table->decimal('egreso',12,2)->nullable();
            $table->integer('candidad')->nullable();
            $table->datetime('fecha')->nullable();
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
            $table->text('descripcion')->nullable();
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
        Schema::dropIfExists('presupuestos');
    }
}
