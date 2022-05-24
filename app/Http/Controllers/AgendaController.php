<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use App\librerias\Utilidades;

class AgendaController extends Controller
{


    public function listado(Request $request){

        if($request->ajax()){

            $tipoAgenda = $request->input('tipo_agenda');

            if($tipoAgenda == 0){

                $agendas = Agenda::all();

            }else{

                $agendas = Agenda::tiposAgendaEventos($tipoAgenda);

            }

            
            $arrayAgendas = array();

            foreach ($agendas as $age){

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

            $agenda->titulo          = $request->input('nombre_evento');
            $agenda->inicio          = $request->input('fecha_ini');
            $agenda->fin             = $request->input('fecha_fin');
            $agenda->tipo_agenda_id  = $request->input('tipo_agenda_id');
            $agenda->texto           = $request->input('descripcion_agenda');

            $agenda->save();

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

        $tipoAgenda = $request->input('tipoAgenda');

        $eventos = Agenda::tiposAgendaEventos($tipoAgenda);

        $arrayAgendas = array();

        foreach ($eventos as $age){

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

            $arrayAgendas[] = $nuevo;

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
