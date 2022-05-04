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
      
        // dd($request->all());

        $formulario = new Formulario();

        // $formulario->Creador_id         = Auth()::user()->id;
        $formulario->nombre             = $request->input('nombre_formulario');
        $formulario->descripcion        = $request->input('descripcion_formulario');

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

            // echo $co." ".$preguntas[$key]."<br>";

            $pregunta->save();

            if($co == "select" || $co == "checkbox" ){

                $multiple = $co."_".($key+1);
                
                // echo strval($multiple);

                $valoresMultiples = $request->input("$multiple");

                // dd($valoresMultiples);

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

        // dd($request->all());

        // return view("campania.home");

        redirect('Campania/home');

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

            echo $key."<br>";

            $respuesta = new Respuesta();

            $respuesta->pregunta_id = $key;
            $respuesta->oportunidad_id = $oportunidad->id;

            if(count($r) > 1){
                
                $respuesta->respuesta = json_encode($r);

            }else{

                $respuesta->respuesta = $r[0];

            }

            $respuesta->save();   

            if(count($r) > 1){

                $respuestasCombos = $r;

                foreach($respuestasCombos as $cr){

                    $comres  =  new RespuestaCombo();

                    $comres->respuesta      = $cr;
                    $comres->respuesta_id   = $respuesta->id;

                    $comres->save();

                }
            }
            

        }

        dd($request->all());

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
