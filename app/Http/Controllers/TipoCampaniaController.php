<?php

namespace App\Http\Controllers;

use App\Models\TipoCampania;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoCampaniaController extends Controller
{

    public function listado(Request $request){

        $tiposCampanias = TipoCampania::all();

        return view('tipo_campania.listado')->with(compact('tiposCampanias'));

    }

    public function guarda(Request $request){

        if($request->ajax()){

            $validator = Validator::make($request->all(), [

                'nombre' => 'required',
                'descripcion' => 'required'

            ]);

            if ($validator->fails()) {

                return json_encode(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            }else{

                $tipoCampania = new TipoCampania();

                $tipoCampania->nombre        = $request->input('nombre');
                $tipoCampania->descripcion   = $request->input('descripcion');

                $tipoCampania->save();

                return json_encode(['success' => true]);
            }
        }else{

        }

    }

    public function ajaxListado(Request $request){

        if($request->ajax()){

            $tiposCampanias = TipoCampania::all();

            return view('tipo_campania.ajaxListado')->with(compact('tiposCampanias'));
            
        }else{
        
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
     * @param  \App\Models\TipoCampania  $tipoCampania
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCampania $tipoCampania)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoCampania  $tipoCampania
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCampania $tipoCampania)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoCampania  $tipoCampania
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCampania $tipoCampania)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoCampania  $tipoCampania
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCampania $tipoCampania)
    {
        //
    }
}
