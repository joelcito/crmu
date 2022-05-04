<?php

namespace App\Http\Controllers;

use App\Models\Campania;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CampaniaController extends Controller
{


    public function listado(Request $request){

        return view('campania.listado');

     }


    public function ajaxListado(Request $request){

        if($request->ajax()){

            $campanias = Campania::all();

            return view('campania.ajaxListado')->with(compact('campanias'));

        }else{

        }

    }

    public function guarda(Request $request){

        if($request->ajax()){

            $validator = Validator::make($request->all(), [
                'nombre_campania' => 'required',
                'fecha_inicio' => 'required',
                'fecha_fin' => 'required',
                'descripcion_campania' => 'required'
            ]);

            if ($validator->fails()) {

                return json_encode(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            }else{

                $campania = new Campania();

                $campania->nombre       = $request->input('nombre_campania');
                $campania->fecha_inicio = $request->input('fecha_inicio');
                $campania->fecha_fin    = $request->input('fecha_fin');
                $campania->descripcion  = $request->input('descripcion_campania');

                $campania->save();

                return json_encode(['success' => true]);
            }
        }else{

        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home(Request $request, $campania_id)
    {
        
        // $formularios = FormularioCampania::where('campania_id',1)->get();

        // return view('campania.home')->with(compact('formularios'));
        return view('campania.home')->with(compact('campania_id'));
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
     * @param  \App\Models\Campania  $campania
     * @return \Illuminate\Http\Response
     */
    public function show(Campania $campania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campania  $campania
     * @return \Illuminate\Http\Response
     */
    public function edit(Campania $campania)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campania  $campania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campania $campania)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campania  $campania
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campania $campania)
    {
        //
    }
}
