<?php

namespace App\Http\Controllers;

use App\Models\TipoAgenda;
use Illuminate\Http\Request;

class TipoAgendaController extends Controller
{


    public function nuevo(Request $request){

        if($request->ajax()){

            $tipo_agenda_id = $request->input('tipo_agenda_id');

            if($tipo_agenda_id == 0){

                $tipo_agenda = new TipoAgenda();

            }else{

                $tipo_agenda = TipoAgenda::find($tipo_agenda_id);

            }

            $tipo_agenda->nombre      = $request->input('nombre_agenda');
            $tipo_agenda->color       = $request->input('color_agenda');
            $tipo_agenda->descripcion = $request->input('descripcion_agenda');

            $tipo_agenda->save();

            $lista = '';
            $select = '
                <div class="input-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Tipo de Agenda</label>
                    <select class="form-control" id="tipo_agenda_id" name="tipo_agenda_id" style="width:100%;">
                ';

            $tiposAgendas = TipoAgenda::all();

            foreach($tiposAgendas as $ta){
                $lista = $lista.'
                    <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                        <div class="d-flex align-items-center">
                            <div class="icon icon-shape icon-sm me-3 shadow text-center">
                                <button class="btn btn-icon-only btn-rounded mb-0 p-1" onclick="cargaEventos('.$ta->id.')" style="background: '.$ta->color.'">
                                <i class="material-icons opacity-10">arrow_back</i>
                                </button>
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="mb-1 text-dark text-sm">'.$ta->nombre.'</h6>
                                <span class="text-xs">'.$ta->descripcion.'</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button onclick="" class="btn btn-icon-only btn-rounded btn-outline-warning mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">edit</i></button>
                        </div>
                    </li>   
                ';

                $select = $select.'
                        <option value="'.$ta->id.'">'.$ta->nombre.'</option>
                    ';
            }
            // devolvemops la llsta de tipos de agendas
            $data['lista'] = $lista;

            // devolvemos el listado de select
            $select = $select.'
                                </select>
                            </div>
                            ';
            $data['select'] = $select;

            // devolvemos treu para saber que fue un exito
            $data['success'] = true;

            return json_encode($data);

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
     * @param  \App\Models\TipoAgenda  $tipoAgenda
     * @return \Illuminate\Http\Response
     */
    public function show(TipoAgenda $tipoAgenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoAgenda  $tipoAgenda
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoAgenda $tipoAgenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoAgenda  $tipoAgenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoAgenda $tipoAgenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoAgenda  $tipoAgenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoAgenda $tipoAgenda)
    {
        //
    }
}
