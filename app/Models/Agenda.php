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
        'titulo',
        'inicio',
        'fin',
        'texto',
        'todoDia',
        'tipo',
        'prioridad',
        'estado',
        'deleted_at',
    ];

    
    public static function listadoAgendasTodos($persona_id){

        // $agendas = Agenda::where('tipo', "Todos")
        //                 ->get();

        $agendas = AgendaPersona::where('persona_id', $persona_id)
                                ->get();

        return $agendas;
                        
    }

    public function tipoAgenda(){

        return $this->belongsTo('App\Models\TipoAgenda', 'tipo_agenda_id');

    }


    public static function tiposAgendaEventos($tipoAgenda, $persona_id){

        $eventos = Agenda::select('agendas.*')
                        ->join('agenda_personas', 'agendas.id', '=', 'agenda_personas.agenda_id')
                        ->where('agenda_personas.persona_id', $persona_id)
                        ->where('agendas.tipo_agenda_id', $tipoAgenda)
                        ->get();

        return $eventos;

    }

    public static function personasConPerfil(){

        $personas = Persona::whereNotNull('perfil_id')->get();

        return $personas;

    }

    public static function personasVendedores(){
        
        $personas = Persona::where('perfil_id', 2)->get();

        return $personas;

    }


}
