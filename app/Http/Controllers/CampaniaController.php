<?php

namespace App\Http\Controllers;

use App\Models\Campania;
use App\Models\Vendedor;
use App\Models\Asignacion;
use App\Models\Oportunidad;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use App\Models\FormularioCampania;
use Illuminate\Support\Facades\Redis;
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

                return json_encode(['success' => true, 'id' => $campania->id]);
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
        
        $formularios = FormularioCampania::where('campania_id',$campania_id)->get();

        $oportunidades = Oportunidad::where('campania_id',$campania_id)->get();

        $vendedores = Vendedor::select('vendedores.id','vendedores.nombres', 'vendedores.apellido_paterno', 'vendedores.apellido_materno')
                                ->join('asignaciones', 'vendedores.id', '=', 'asignaciones.vendedor_id')
                                ->join('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
                                ->where('oportunidades.campania_id',$campania_id)
                                ->groupBy('vendedores.id')
                                ->get();

        // return view('campania.home')->with(compact('formularios'));
        return view('campania.home')->with(compact('campania_id', 'formularios', 'oportunidades', 'vendedores'));
    }

    public function ajaxBuscaVendedor(Request $request){
        // dd($request->all());

        if($request->input('vendedor')){

            $queryVendedor = Vendedor::query();

            if($request->filled('vendedor')){

                $vendedor = $request->input('vendedor');
                $queryVendedor->Orwhere('nombres', 'like', "%$vendedor%");
                $queryVendedor->Orwhere('apellido_paterno', 'like', "%$vendedor%");
                $queryVendedor->Orwhere('apellido_materno', 'like', "%$vendedor%");

                $queryVendedor->limit(8);
            }

            $vendedores = $queryVendedor->get();
            
            return view('campania.ajaxBuscaVendedor')->with(compact('vendedores'));

        }
    }

    public function asignacionVendedorCampania(Request $request){

        $oportunidades = $request->input('oportunidades');

        $vendedor = $request->input('vendedorAsignacion');

        foreach ($oportunidades as $key => $opo){

            $asignacion = new Asignacion();

            $asignacion->oportunidad_id   = $key;
            $asignacion->vendedor_id      = $vendedor;
            $asignacion->fecha_asignacion = date('Y-m-d H:i:s');
            $asignacion->estado = 1;

            $asignacion->save();

        }

    }

    public function ajaxListadoOportunidades(Request $request){

        $campania_id = $request->input('campania');

        $oportunidades = Asignacion::select('*','oportunidades.id as opo')
                                    ->rightJoin('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
                                    ->rightJoin('personas', 'personas.id', '=', 'oportunidades.persona_id')
                                    ->where('oportunidades.campania_id', $campania_id)
                                    ->whereNull('asignaciones.vendedor_id')
                                    ->get();

        
        return view('campania.ajaxListadoOportunidades')->with(compact('oportunidades'));

    }

    public function ajaxListadoVendedores(Request $request){

        // $campania_id = $request->input('campania');

        // $vendedores = Vendedor::select('vendedores.id','vendedores.nombres', 'vendedores.apellido_paterno', 'vendedores.apellido_materno')
        //                         ->join('asignaciones', 'vendedores.id', '=', 'asignaciones.vendedor_id')
        //                         ->join('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
        //                         ->where('oportunidades.campania_id',$campania_id)
        //                         ->groupBy('vendedores.id')
        //                         ->get();

        $vendedores = Vendedor::all();

        return view('campania.ajaxListadoVendedores')->with(compact('vendedores'));
    }

    public function ajaxListadoClientesAsignados(Request $request){

        $campania_id = $request->input('campania');

        $clientesAsigandos  = Asignacion::select('personas.nombres', 'personas.apellido_paterno', 'personas.apellido_materno', 'vendedores.nombres as nombrev', 'vendedores.apellido_paterno as appaternov', 'vendedores.apellido_materno as apmaternov', 'asignaciones.id as id_asignacion', 'oportunidades.id as id_oportunidades')
                                        ->join('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
                                        ->join('personas', 'personas.id', '=', 'oportunidades.persona_id')
                                        ->join('vendedores','vendedores.id', '=','asignaciones.vendedor_id')
                                        ->where('oportunidades.campania_id',$campania_id)
                                        ->where('asignaciones.estado',1)
                                        ->get();

        return view('campania.ajaxListadoClientesAsignados')->with(compact('clientesAsigandos'));

    }

    public function ajaxListadoSeguimientos(Request $request){

        $asignacion_id = $request->input('asignacion');
        $oportunidad_id = $request->input('oportunidad');


        $asignaciones = Asignacion::where('oportunidad_id',$oportunidad_id)
                                    ->get();
                                    
        $arrarAsignaciones = array();

        foreach($asignaciones as $as){
            
            array_push($arrarAsignaciones,$as->id);

        }

        $seguimientos = Seguimiento::whereIn('asignacion_id', $arrarAsignaciones)
                                    ->get();

        return view('campania.ajaxListadoSeguimientos')->with(compact('seguimientos'));

    }

    public function ajaxListadoVendedorTramsferencia(Request $request){

        $vendedores = Vendedor::all();

        return view('campania.ajaxListadoVendedorTramsferencia')->with(compact('vendedores'));

    }

    public function tramsferirOportunidadVendedor(Request $request){    
        // dd("holas");
        // dd($request->all());

        $asignacion_id = $request->input('asignacion');

        $asignacion = Asignacion::find($asignacion_id);

        $asignacion->estado = 0;

        $asignacion->save();


        $newAsignacion = new Asignacion();

        $newAsignacion->vendedor_id         = $request->input('vendedor');
        $newAsignacion->oportunidad_id      = $request->input('oportunidad');
        $newAsignacion->fecha_asignacion    = date('Y-m-d H:i:s');
        $newAsignacion->estado              = 1;

        $newAsignacion->save();

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
