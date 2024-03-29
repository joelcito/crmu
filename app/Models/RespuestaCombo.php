<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RespuestaCombo extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'formulario_id',
        'respuesta_id',
        'respuesta',
        'estado',
        'deleted_at',
    ];

    public static function cantidadRespuesta($combo_id){

        $cant = RespuestaCombo::where('valor_combo_id',$combo_id)->count();

        return $cant;

    }
}
