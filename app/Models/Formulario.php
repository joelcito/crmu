<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formulario extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombre',
        'descripcion',
        'estado',
        'deleted_at',
    ];

    public static function componente($nombre){
        
        $componete = Componente::where('nombre', $nombre)->first();

        return $componete;

    }

    public static function valorCombos($pregunta){
        
        $vloresCombos  = ValorCombo::where('pregunta_id', $pregunta)->get();

        return $vloresCombos;

    }

    public static function respuestasCombos($valorCombo_id){

        $respustasCombos = RespuestaCombo::where('valor_combo_id', $valorCombo_id)
                                        ->get();

        return $respustasCombos;
    }

    public static function cantidadRespondidas($valorCombo_id){

        $cantrespuestas = RespuestaCombo::where('valor_combo_id',$valorCombo_id)
                                        ->count();

        return $cantrespuestas;

    }
}
