<?php

namespace App\Http\Controllers;

use App\Models\Campania;
use App\Models\Vendedor;
use App\Models\Asignacion;
use App\Models\Oportunidad;
use Illuminate\Http\Request;
use App\Models\FormularioCampania;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller{

    public function listado(Request $request){

        $vendedores = Vendedor::all();

        return view('vendedor.listado')->with(compact('vendedores'));
        // dd("holas");
    }

    public function guarda(Request $request){
        
        if($request->ajax()){

            $validator = Validator::make($request->all(), [
                'ap_paterno' => 'required',
                'ap_materno' => 'required',
                'nombres' => 'required',
                'email' => 'required',
                'celular' => 'required',
                'cedula' => 'required'
            ]);

            if ($validator->fails()) {

                return json_encode(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);

            }else{

                $vendedor = new Vendedor();

                $vendedor->nombres             = $request->input('nombres');
                $vendedor->apellido_paterno   = $request->input('ap_paterno');
                $vendedor->apellido_materno   = $request->input('ap_materno');
                $vendedor->cedula             = $request->input('cedula');
                $vendedor->celular            = $request->input('celular');
                $vendedor->email              = $request->input('email');

                $vendedor->save();

                // return json_encode(['success' => true, 'id' => $campania->id]);
                return json_encode(['success' => true]);
            }
        }else{

        }

    }

    public function ajaxListado(Request $request){

        if($request->ajax()){

            $vendedores = Vendedor::all();

            return view('vendedor.ajaxListado')->with(compact('vendedores'));

        }else{
        
        }


    }

    public function ajaxBuscaCampania(Request $request){
        if($request->ajax()){
            if($request->input('campania')){

                $queryCampania = Campania::query();
    
                if($request->filled('campania')){
    
                    $campania = $request->input('campania');
                    $queryCampania->where('nombre', 'like', "%$campania%");
    
                    $queryCampania->limit(8);
                }
    
                $campanias = $queryCampania->get();
                
                return view('vendedor.ajaxBuscaCampania')->with(compact('campanias'));
    
            }
        }else{
        
        }
        
        


    }

    public function muestraFormularios(Request $request){

        if($request->ajax()){

            $campanias_id = $request->input('campania');

            $campaniasFormularios = FormularioCampania::where('campania_id',$campanias_id)
                                                        ->get();
            $options = "";
    
            foreach($campaniasFormularios as $fc){
                if($fc->formulario){
    
                    $options =$options.'<option value="'.$fc->formulario->id.'">'.$fc->formulario->nombre.'</option>';
    
                }
            }
    
            $html = '
                    <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">Seleccione el Formulario</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="formulario_id">
                            '.$options.'
                        </select>
                    </div>
                    ';
    
            return $html;

        }else{
        
        }
        

    }

    public function asignarCampaniaVendedor(Request $request){

        if($request->ajax()){
            $formulario_id = $request->input('formulario_id');
            $campanias_id  = $request->input('campania_id');
    
            $oportunidades = Oportunidad::where('formulario_id',$formulario_id)
                                        ->where('campania_id',$campanias_id)
                                        ->get();
    
            foreach($oportunidades as $o){
    
                $asignacion = new Asignacion();
    
                $asignacion->vendedor_id = $request->input('vendedor_id');
                $asignacion->oportunidad_id = $o->id;
                $asignacion->fecha_asignacion = date('Y-m-d h:i:s');
    
                $asignacion->save();
    
            }
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
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendedor $vendedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendedor $vendedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendedor $vendedor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendedor  $vendedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendedor $vendedor)
    {
        //
    }
}
