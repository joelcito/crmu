<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRespuestaSeguimientoIdToSeguimientos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seguimientos', function (Blueprint $table) {
            $table->unsignedBigInteger('respuesta_seguimiento_id')->nullable()->after('medio_seguimiento_id');
            $table->foreign('respuesta_seguimiento_id')->references('id')->on('respuesta_seguimientos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seguimientos', function (Blueprint $table) {
            $table->dropForeign(['respuesta_seguimiento_id']);
            $table->dropColumn('respuesta_seguimiento_id');
        });
    }
}
