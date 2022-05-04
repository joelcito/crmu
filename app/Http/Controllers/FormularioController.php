    <?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\Componente;
use App\Models\Formulario;
use App\Models\ValorCombo;
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

        dd($request->all());

        // if(filled($request->input('check_ap'))){

        //     dd("si");

        // }else{

        //     dd("no");
            
        // }

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



        $formularioCampania = new FormularioCampania();

        $formularioCampania->campania_id    = $request->input("campania_id");
        $formularioCampania->formulario_id  = $formulario->id;

        $formularioCampania->save();

        // dd($request->all());

        // return view("campania.home");

        redirect('Campania/home');

    }

    public function respuestaFormulario(Request $request, $campania_id, $formulario_id){
        // dd($request->all());
        $formulario = Formulario::find($formulario_id);

        $preguntas_form = Pregunta::where('formulario_id', $formulario_id)
                                    ->get();

        return view('formulario.respuesta')->with(compact('campania_id','formulario', 'preguntas_form'));
    }

    public function guardarRespuestaFormulario(Request $request){
        
        $respuestas  = $request->input('respuestas');

        foreach ($respuestas as $key => $r){

            echo $key."<br>";

            $respuesta = new Respuesta();

            $respuesta->pregunta_id = $key;

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
