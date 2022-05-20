<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Componente;
use App\Models\Formulario;
use App\Models\ValorCombo;
use App\Models\Oportunidad;
use Illuminate\Http\Request;
use App\Models\RespuestaCombo;
use App\Models\FormularioCampania;

class FormularioController extends Controller
{

    public function formulario(Request $request, $campania_id){

        $componentes = Componente::all();

        return view('campania.formulario')->with(compact('campania_id', 'componentes'));
        
    }

    public function guardaFormulario(Request $request){

        $formulario = new Formulario();

        // $formulario->Creador_id         = Auth()::user()->id;
        $formulario->nombre             = $request->input('nombre_formulario');
        $formulario->descripcion        = $request->input('descripcion_formulario');
        $formulario->color              = $request->input('color_formulario');

        if($request->has('img-formulario')){
            // subiendo el archivo al servidor
            $archivo    = $request->file('img-formulario');
            $direcion   = "imagenesFormulario/";
            $nombreArchivo = date('YmdHis').".".$archivo->getClientOriginalExtension();
            $archivo->move($direcion,$nombreArchivo);

            $formulario->imagen            = $nombreArchivo;
        }

        $formulario->save();

        $componetes = $request->input('componente_tipo');
        $preguntas = $request->input('nombre_pregunta');

        foreach($componetes as $key => $co){

            $componente = Componente::where('nombre',$co)
                                    ->first();

            $pregunta  = new Pregunta();

            $pregunta->nombre           = $preguntas[$key];
            $pregunta->formulario_id    = $formulario->id;
            $pregunta->componente_id    = $componente->id;
            $pregunta->estado           = 0;


            $pregunta->save();

            if($co == "select" || $co == "checkbox" ){

                $multiple = $co."_".($key+1);
                
                $valoresMultiples = $request->input("$multiple");

                foreach($valoresMultiples as $m){

                    $valorCombo = new ValorCombo();

                    $valorCombo->valor = $m;
                    $valorCombo->pregunta_id = $pregunta->id;
                    $valorCombo->formulario_id = $formulario->id;

                    $valorCombo->save();
                }
                
            }else{

            }

        }

        // Creamos una pregunta para ver si es requerido elap paterno
        $pregunta  = new Pregunta();
        
        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'ap_paterno';
        $pregunta->estado           = 1;

        if($request->filled('apellido_paterno')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();


        // Creamos una pregunta para ver si es requerido al ap materno
        $pregunta  = new Pregunta();

        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'ap_materno';
        $pregunta->estado           = 1;

        if($request->filled('apellido_materno')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();


        // Creamos una pregunta para ver si es requerido el nombre
        $pregunta  = new Pregunta();

        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'nombre';
        $pregunta->estado           = 1;

        if($request->filled('nombres')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();


        // Creamos una pregunta para ver si es requerido el email
        $pregunta  = new Pregunta();

        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'email';
        $pregunta->estado           = 1;

        if($request->filled('email')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();


        // Creamos una pregunta para ver si es requerido el celular
        $pregunta  = new Pregunta();

        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'celular';
        $pregunta->estado           = 1;

        if($request->filled('celular')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();


        // Creamos una pregunta para ver si es requerido el cedula
        $pregunta  = new Pregunta();

        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'cedula';
        $pregunta->estado           = 1;

        if($request->filled('cedula')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();


        // Creamos una pregunta para ver si es requerido el expedido
        $pregunta  = new Pregunta();

        $pregunta->componente_id    = 1;
        $pregunta->formulario_id    = $formulario->id;
        $pregunta->nombre           = 'expedido';
        $pregunta->estado           = 1;

        if($request->filled('expedido')){

            $pregunta->requerido        = 1;

        }

        $pregunta->save();

        $formularioCampania = new FormularioCampania();

        $formularioCampania->campania_id    = $request->input("campania_id");
        $formularioCampania->formulario_id  = $formulario->id;

        $formularioCampania->save();

        return redirect('Campania/home/'.$formularioCampania->campania_id);

    }

    public function respuestaFormulario(Request $request, $campania_id, $formulario_id){

        $formulario = Formulario::find($formulario_id);

        $preguntas_form = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado', 0)
                                    ->get();

                                    
        $ap_paterno = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','ap_paterno')
                                ->first();

        $ap_materno = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','ap_materno')
                                ->first();

        $nombre = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','nombre')
                                ->first();

        $email = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','email')
                                ->first();

        $celular = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','celular')
                                ->first();

        $cedula = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','cedula')
                                ->first();

        $expedido = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','expedido')
                                ->first();

        return view('formulario.respuesta')->with(compact('campania_id','formulario', 'preguntas_form', 'ap_paterno',  'ap_materno', 'nombre', 'email', 'celular', 'cedula', 'expedido'));
    }

    public function guardarRespuestaFormulario(Request $request){

        // dd($request->all());

        // creando la persona
        $persona = new Persona();

        $persona->apellido_paterno   = $request->input('apellido_paterno');
        $persona->apellido_materno   = $request->input('apellido_materno');
        $persona->nombres            = $request->input('nombre');
        $persona->email              = $request->input('email');
        $persona->celular            = $request->input('celular');
        $persona->cedula             = $request->input('cedula');
        $persona->expedido           = $request->input('expedido');

        $persona->save();

        // creando la oportunidad
        $oportunidad = new Oportunidad();

        $oportunidad->formulario_id     = $request->input('formulario_id');
        $oportunidad->campania_id       = $request->input('campania_id');
        $oportunidad->persona_id        = $persona->id;
        
        $oportunidad->save();


        // guardamos las respustas
        $respuestas  = $request->input('respuestas');

        foreach ($respuestas as $key => $r){

            // echo $key."<br>";

            $respuesta = new Respuesta();

            $respuesta->pregunta_id = $key;
            $respuesta->oportunidad_id = $oportunidad->id;

            // sacamos para saber que pregunta es (combo o normal)
            $pregunta = Pregunta::find($key);

            if(count($r) > 1){

                $arryCombos = array();

                foreach($r as $idCom){

                    $valorCombo = ValorCombo::find($idCom);

                    array_push($arryCombos, $valorCombo->valor);

                }

                $respuesta->respuesta = json_encode($arryCombos);
                // $respuesta->respuesta = json_encode($r);

            }else{

                if($pregunta->componente_id == 3 || $pregunta->componente_id == 4){

                    $valorCombo = ValorCombo::find($r[0]);
                    $respuesta->respuesta = $valorCombo->valor;

                }else{

                    $respuesta->respuesta = $r[0];

                }

            }

            $respuesta->save(); 

            if($pregunta->componente_id == 3 || $pregunta->componente_id == 4){


                // if(count($r) > 1){

                $respuestasCombos = $r;

                foreach($respuestasCombos as $cr){

                    $valorCombo = ValorCombo::find($cr);

                    if($valorCombo){


                        $comres  =  new RespuestaCombo();

                        // $comres->respuesta      = $cr;
                        $comres->respuesta          = $valorCombo->valor;
                        $comres->respuesta_id       = $respuesta->id;
                        $comres->valor_combo_id     = $valorCombo->id;

                        $comres->save();
                    }


                }

                // }
            }

        }

        // dd($request->all());

    }

    public function respuestaFormularioCompartir(Request $requestt, $campania_id, $formulario_id, $red_social){

        if($red_social == "fb" || $red_social == "wa" || $red_social == "ig" || $red_social == "tw"){

            $formulario = Formulario::find($formulario_id);

            $preguntas_form = Pregunta::where('formulario_id', $formulario_id)
                                        ->where('estado', 0)
                                        ->get();

                                        
            $ap_paterno = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','ap_paterno')
                                    ->first();

            $ap_materno = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','ap_materno')
                                    ->first();

            $nombre = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','nombre')
                                    ->first();

            $email = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','email')
                                    ->first();

            $celular = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','celular')
                                    ->first();

            $cedula = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','cedula')
                                    ->first();

            $expedido = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado',1)
                                    ->where('nombre','expedido')
                                    ->first();

            return view("formulario.respuestaFormularioCompartir")->with(compact('campania_id','formulario', 'preguntas_form', 'ap_paterno',  'ap_materno', 'nombre', 'email', 'celular', 'cedula', 'expedido'));

        }else{

            return view("errors.error404");

        }

    }

    public function editaFormulario(Request $request,  $campania_id,$formulario_id){

        $formulario = Formulario::find($formulario_id);

        $preguntas_form = Pregunta::where('formulario_id', $formulario_id)
                                    ->where('estado', 0)
                                    ->get();

                                    
        $ap_paterno = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','ap_paterno')
                                ->first();

        $ap_materno = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','ap_materno')
                                ->first();

        $nombre = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','nombre')
                                ->first();

        $email = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','email')
                                ->first();

        $celular = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','celular')
                                ->first();

        $cedula = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','cedula')
                                ->first();

        $expedido = Pregunta::where('formulario_id', $formulario_id)
                                ->where('estado',1)
                                ->where('nombre','expedido')
                                ->first();

        $componentes = Componente::all();

        return view('formulario.editaFormulario')->with(compact('campania_id','formulario', 'preguntas_form', 'ap_paterno',  'ap_materno', 'nombre', 'email', 'celular', 'cedula', 'expedido', 'componentes'));

    }

    public function guardarEditadoFormulario(Request $request){

        $formulario_id   = $request->input('formulario_id');
        $campania_id     = $request->input('campania_id');

        $formulario = Formulario::find($formulario_id);

        $formulario->nombre            = $request->input('nombre_formulario');
        $formulario->descripcion       = $request->input('descripcion_formulario');
        $formulario->color              = $request->input('color_formulario');

        // preguntamos si mando una nueva imagen
        if($request->has('img-formulario')){
            
            $archivo    = $request->file('img-formulario');
            $direcion   = "imagenesFormulario/";
            $nombreArchivo = date('YmdHis').".".$archivo->getClientOriginalExtension();
            $archivo->move($direcion,$nombreArchivo);

            $formulario->imagen            = $nombreArchivo;
        }

        $formulario->save();


        // ahroa editamos las preguntas
        $preguntasArray             = $request->input('nombre_pregunta');
        $arrayComponentes           = $request->input('componente_tipo');
        $formulario_id              = $request->input('formulario_id');

        $idPreguntas = array_keys($preguntasArray);

        $cantIdString = 0;
         
        foreach($idPreguntas as $pre){

            $pregunta = Pregunta::find($pre);

            if(is_string($pre)){

                $idPregunta = trim($pre,"'");

                $pregunta = Pregunta::find($idPregunta);

                $pregunta->nombre           = $preguntasArray[$pre];

                if($pregunta->componente_id == 3  || $pregunta->componente_id == 4){
                    
                    $vloresCombos  = Formulario::valorCombos($pregunta->id);

                    $arrayValorCombosAntiguo = array();

                    foreach($vloresCombos as $vc){

                        array_push($arrayValorCombosAntiguo,$vc->id);

                        ValorCombo::destroy($vc->id);

                    }

                }else{

                    echo "<b>".$pregunta->componente_id."</b><br>";

                }

                $componente = Formulario::componente($arrayComponentes[$cantIdString]);

                $pregunta->componente_id    = $componente->id;
                $pregunta->save();

                
                // AHORA PARA LOS VALORES COMBOS
                $componente = $arrayComponentes[$cantIdString]."_".$cantIdString;

                $arraryComponetesCombos = $request->input($componente);


                if($arraryComponetesCombos){

                    $arrayValorCombosNuevos = array();

                    foreach($arraryComponetesCombos as $co){

                        if($co){

                            $valorCombos = new  ValorCombo();

                            $valorCombos->formulario_id =   $formulario_id;
                            $valorCombos->pregunta_id   =   $pregunta->id;
                            $valorCombos->valor         =   $co;
    
                            $valorCombos->save();

                            array_push($arrayValorCombosNuevos, $valorCombos->id);

                        }
                    }

                    // ahroa hacemos los cambios en las respuestas combos ya respondidas

                    foreach ($arrayValorCombosAntiguo as $keyArrayCombos => $vc){

                        $respuesCombo = Formulario::respuestasCombos($vc);

                        foreach ($respuesCombo as $resCom){

                            $resCom->valor_combo_id = $arrayValorCombosNuevos[$keyArrayCombos];
                            $resCom->save();

                        }

                    }
                }


                $cantIdString++;

            }else{

                $cantExistentes = $cantIdString;

                // CREAMOS LA PREGUNTA POR QUE ES NUEVA
                $pregunta =  new Pregunta();

                $pregunta->nombre           = $preguntasArray[$pre];

                $componente = Componente::where('nombre', $arrayComponentes[$cantExistentes])->first();

                $pregunta->componente_id    = $componente->id;
                $pregunta->formulario_id    = $formulario_id;
                $pregunta->estado = 0;

                $pregunta->save();

                if($componente->id == 3 || $componente->id == 4){

                    if($componente->id == 3){

                        $componenteEnviado = "select_".$cantExistentes;
                        
                    }else{
                        $componenteEnviado = "checkbox_".$cantExistentes;
                    }

                    $arrayEnviados = $request->input($componenteEnviado);

                    foreach($arrayEnviados as $aEnv){

                        $valorcombo = new ValorCombo();

                        $valorcombo->formulario_id      =   $formulario_id;
                        $valorcombo->pregunta_id        =   $pregunta->id;
                        $valorcombo->valor              =   $aEnv;

                        $valorcombo->save();

                    }

                }   

                $cantExistentes++;
            }


        }

        

        // array de eliminaciones
        $preguntascombosEliminadas  = explode(",", $request->input('removeCombos'));
        $preguntasEliminadas        = explode(",", $request->input('removeBlock'));

        // preguntas combos eliminadas
        foreach ($preguntascombosEliminadas as $precom){

            ValorCombo::destroy($precom);

        }

        // ELIMINAMOS LAS PREGUNTAS ENVIADas
        foreach($preguntasEliminadas as $pregun){

            Pregunta::destroy($pregun);

        }

        return redirect('Formulario/respuestaFormulario/'.$campania_id."/".$formulario_id);

    }

    public function validaValorCombo(Request $request){

        $combo_id = $request->input('combo');

        $data['cantidad'] = Formulario::cantidadRespondidas($combo_id);

        return json_encode($data);
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
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function show(Formulario $formulario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function edit(Formulario $formulario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formulario $formulario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Formulario  $formulario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formulario $formulario)
    {
        //
    }
}
