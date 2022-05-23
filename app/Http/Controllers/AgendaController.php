<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{


    public function listado(Request $request){

        if($request->ajax()){

            $agendas = Agenda::all();
            
            $arrayAgendas = array();

            foreach ($agendas as $age){

                $nuevo = array(
                    'id' => $age->id,
                    'title' => $age->title,
                    // 'start' => str_replace(" ","T",$age->start),
                    // 'end' => str_replace(" ","T",$age->end),
                    'start' => $age->start,
                    'end' => $age->end,
                    'text' => $age->text,
                );

                $arrayAgendas[] = $nuevo;

            }


            echo json_encode($arrayAgendas);
            // return json_encode($arrayAgendas);
            
            // // $agendas = Agenda::select('*')
            // $data['agendas'] = Agenda::select('id', 'title', 'start', 'end',  'text')
            //                     ->get();

            // // dd($data['agendas']);

            // // return json_encode($data);
            // echo json_encode($data['agendas']);

            // // dd(json_encode($data['agendas']));
        }else{
            // echo "eror";
        }

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
