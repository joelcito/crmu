<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agenda extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'tipo_agenda_id',
        'title',
        'start',
        'end',
        'text',
        'estado',
        'deleted_at',
    ];

    public function tipoAgenda(){

        return $this->belongsTo('App\Models\TipoAgenda', 'tipo_agenda_id');

    }


    public static function tiposAgendaEventos($tipoAgenda){

        $eventos = Agenda::where('tipo_agenda_id', $tipoAgenda)
                        ->get();

        return $eventos;

    }
}
