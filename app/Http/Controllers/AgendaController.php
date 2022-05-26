<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\librerias\Utilidades;
use App\Models\AgendaPersona;

class AgendaController extends Controller
{


    public function listado(Request $request){

        if($request->ajax()){

            $tipoAgenda = $request->input('tipo_agenda');

            // $persona_id = 19;
            // $persona_id = 20;
            $persona_id = 21;

            if($tipoAgenda == 0){

                $agendas = Agenda::listadoAgendasTodos($persona_id);
                // $agendas = Agenda::all();

            }else{

                $agendas = Agenda::tiposAgendaEventos($tipoAgenda, $persona_id);

            }

            
            $arrayAgendas = array();

            // dd($agendas[0]->agenda->tipoAgenda->color);
            // dd($agendas->agendas);

            foreach ($agendas as $age){

                $color  = $age->agenda->tipoAgenda->color;

                $nuevo = array(
                    'id'             => $age->agenda->id,
                    'title'          => $age->agenda->titulo,
                    'start'          => $age->agenda->inicio,
                    'end'            => $age->agenda->fin,
                    'color'          => $color,
                    'text'           => $age->agenda->texto,
                    'tipo_agenda_id' => $age->agenda->tipo_agenda_id,
                );

                $arrayAgendas[] = $nuevo;

            }

            echo json_encode($arrayAgendas);

        }else{
            // echo "eror";
        }

    }


    public function nuevoAgenda(Request $request){

        // dd($request->all());
        
        if($request->ajax()){

            $evento_id = $request->input('evento_id');

            if($evento_id == 0){

                $agenda = new Agenda();

            }else{

                $agenda = Agenda::find($evento_id);

            }

            $agenda->todoDia = $request->input('todoDia');

            $fechaIni   =  $request->input('fecha_ini')." ".$request->input('hora_ini');
            $fechaFin   =  $request->input('fecha_fin')." ".$request->input('hora_fin');

            $agenda->titulo          = $request->input('nombre_evento');
            $agenda->inicio          = $fechaIni;
            $agenda->fin             = $fechaFin;
            $agenda->tipo_agenda_id  = $request->input('tipo_agenda_id');
            $agenda->prioridad_id    = $request->input('prioridad_id');
            $agenda->texto           = $request->input('descripcion_agenda');
            
            // VERIFICAMOS DE QUE TIPO ES
            if($request->filled('todos') || $request->filled('vendedores')){
                if($request->filled('todos')){
                    $tipoAgendaClasificado = "Todos";
                }else{
                    $tipoAgendaClasificado = "Vendedores";
                }
            }elseif($request->filled('privado')){
                $tipoAgendaClasificado = "Privado";
            }elseif($request->filled('destinatarios')){
                $tipoAgendaClasificado = "Destinatario";
            }

            $agenda->tipo   = $tipoAgendaClasificado;

            $agenda->save();


            if($request->filled('todos') || $request->filled('vendedores')){

                if($request->filled('todos')){

                    $personas = Agenda::personasConPerfil();

                }else{

                    $personas = Agenda::personasVendedores();

                }

                foreach($personas as $per){
                    
                    $agendaPersona = new AgendaPersona();

                    $agendaPersona->agenda_id = $agenda->id;
                    $agendaPersona->persona_id = $per->id;

                    $agendaPersona->save();

                }
            
            }

            if($request->filled('privado')){

                // $persona_id = 19;
                // $persona_id = 20;
                $persona_id = 21;

                $agendaPersona = new AgendaPersona();

                $agendaPersona->agenda_id = $agenda->id;
                $agendaPersona->persona_id = $persona_id;

                $agendaPersona->save();


            }

            if($request->filled('destinatarios')){

                $personasSelect = $request->input('personasSeleccionadas');

                foreach($personasSelect as $perSel){
                    
                    $agendaPersona = new AgendaPersona();

                    $agendaPersona->agenda_id = $agenda->id;
                    $agendaPersona->persona_id = $perSel;

                    $agendaPersona->save();

                }

            }

        }


    }

    public function editaDrop(Request $request){

        if($request->ajax()){

            $utilidades = new Utilidades();

            $evento_id = $request->input('evento');

            $agenda = Agenda::find($evento_id);
            
            $fechaIni = $request->input('fechaIni');
            $fechaFin = $request->input('fechaFin');

            $agenda->inicio  = $utilidades->fechaFullCalendarFormat($fechaIni);
            $agenda->fin     = $utilidades->fechaFullCalendarFormat($fechaFin);

            $agenda->save();

        }

    }


    public function ajaxListado(Request $request){

        // dd($request->input('tipoAgenda'));
        // dd($request->all());

        $tipoAgenda = $request->input('tipoAgenda');

        // bandera pra saber si fue por todos o si fue por tipo de evento
        $sw = true;

        $persona_id = 19;
        // $persona_id = 20;
        // $persona_id = 21;

        if($tipoAgenda == 0){

            // $agendas = Agenda::all();
            $agendas = Agenda::listadoAgendasTodos($persona_id);
            $sw = true;

        }else{

            $agendas = Agenda::tiposAgendaEventos($tipoAgenda,$persona_id);
            $sw = false;

        }


        $arrayAgendas = array();

        foreach ($agendas as $age){

            // dd($age->tipoAgenda);
            
            if($sw){

                $color  = $age->agenda->tipoAgenda->color;

                $nuevo = array(
                    'id'             => $age->agenda->id,
                    'title'          => $age->agenda->titulo,
                    'start'          => $age->agenda->inicio,
                    'end'            => $age->agenda->fin,
                    'color'          => $color,
                    'text'           => $age->agenda->texto,
                    'tipo_agenda_id' => $age->agenda->tipo_agenda_id,
                );

            }else{

                $color  = $age->tipoAgenda->color;

                $nuevo = array(
                    'id'             => $age->id,
                    'title'          => $age->titulo,
                    'start'          => $age->inicio,
                    'end'            => $age->fin,
                    'color'          => $color,
                    'text'           => $age->texto,
                    'tipo_agenda_id' => $age->tipo_agenda_id,
                );

            }

            $arrayAgendas[] = $nuevo;



            // if($age->agenda){

            //     if($age->agenda->tipoAgenda){

            //         echo "si";

            //     }else{

            //         // echo "no";
            //         dd("no");

            //     }

            //     // dd($age->agenda);

            //     $color  = $age->agenda->tipoAgenda->color;

            //     $nuevo = array(
            //         'id'             => $age->agenda->id,
            //         'title'          => $age->agenda->titulo,
            //         'start'          => $age->agenda->inicio,
            //         'end'            => $age->agenda->fin,
            //         'color'          => $color,
            //         'text'           => $age->agenda->texto,
            //         'tipo_agenda_id' => $age->agenda->tipo_agenda_id,
            //     );

            //     $arrayAgendas[] = $nuevo;



            // }else{

            //     // echo "no - ";

            // }

        }

        return json_encode($arrayAgendas);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}
