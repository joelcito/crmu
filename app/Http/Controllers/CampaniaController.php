<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Campania;
use App\Models\Vendedor;
use App\Models\Prioridad;
use App\Models\RedSocial;
use App\Models\Respuesta;
use App\Models\Asignacion;
use App\Models\Formulario;
use App\Models\Comprobante;
use App\Models\Oportunidad;
use App\Models\Presupuesto;
use App\Models\Seguimiento;
use Illuminate\Http\Request;
use App\librerias\Utilidades;
use GuzzleHttp\Handler\Proxy;
use App\Models\FormularioCampania;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class CampaniaController extends Controller
{


    public function listado(Request $request){

        dd($request->session()->pull('user'));
        // dd(Auth::user());

        return view('campania.listado');

    }


    public function ajaxListado(Request $request){

        if($request->ajax()){

            $campanias = Campania::listado();

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

                // AGREGAMOS LA NUEVA CAMPANIA
                $campania = new Campania();

                $campania->nombre       = $request->input('nombre_campania');
                $campania->fecha_inicio = $request->input('fecha_inicio');
                $campania->fecha_fin    = $request->input('fecha_fin');
                $campania->descripcion  = $request->input('descripcion_campania');

                $campania->save();


                // AGREGAMOS EL NUEVO PRESUPUESTO
                $presupuesto = new Presupuesto();

                $presupuesto->campania_id    = $campania->id;
                $presupuesto->ingreso        = $request->input('presupuesto');
                $presupuesto->fecha          = date('Y-m-d H:i:s');
                $presupuesto->tipo           = "Ingreso";
                $presupuesto->descripcion    = "Primer Ingreso para la camaña";
                $presupuesto->egreso         = 0;

                $presupuesto->save();

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
    public function home(Request $request, $campania_id){

        // PARA LAS ASIGACIONES
        $formularios = FormularioCampania::where('campania_id',$campania_id)->get();

        $oportunidades = Oportunidad::where('campania_id',$campania_id)->get();

        $vendedores = Vendedor::select('vendedores.id','vendedores.nombres', 'vendedores.apellido_paterno', 'vendedores.apellido_materno')
                                ->join('asignaciones', 'vendedores.id', '=', 'asignaciones.vendedor_id')
                                ->join('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
                                ->where('oportunidades.campania_id',$campania_id)
                                ->groupBy('vendedores.id')
                                ->get();
        
        // PARA EL CONTROL DE BALANCE GENERAL
        $ingresos = Campania::ingresos($campania_id);
                                
        // EGRESOS
        $egresos = Campania::egresos($campania_id);

        // GASTOS
        $gastos = Gasto::all();

        // PRESUPUESTO ACTUAL
        $presupuesto = Campania::presupuestoActual($campania_id);

        // CANTIDAD DE PERSONAS QUE RESPONDIERON EL FORMULARIO
        $cantidadPersonasRespondieron = Campania::cantPersonasRegistradas($campania_id);

        // TIPOSD DE EVENTOS
        $tipoAgendas = Campania::tiposAgenda($campania_id);

        // VVENDEDORES
        $vendedoresAgenda = Campania::vendedoresAgenda($campania_id);

        // PRIORIDADES 
        $prioridades = Prioridad::all();

        // SACAMOS TODAS LAS REDES SOCIALES
        $redSociales = RedSocial::all();

        // return view('campania.home')->with(compact('formularios'));
        return view('campania.home')->with(compact('campania_id', 'formularios', 'oportunidades', 'vendedores', 'ingresos', 'egresos', 'gastos', 'presupuesto', 'cantidadPersonasRespondieron', 'tipoAgendas', 'vendedoresAgenda', 'prioridades','redSociales'));
    }

    public function ajaxBuscaVendedor(Request $request){
        // dd($request->all());

        if($request->ajax()){
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
        }else{
        
        }

        
    }

    public function asignacionVendedorCampania(Request $request){

        if($request->ajax()){

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

        }else{
        
        }

       

    }

    public function ajaxListadoOportunidades(Request $request){

        if($request->ajax()){

            $campania_id = $request->input('campania');

            $oportunidades = Asignacion::select('*','oportunidades.id as opo')
                                        ->rightJoin('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
                                        ->rightJoin('personas', 'personas.id', '=', 'oportunidades.persona_id')
                                        ->where('oportunidades.campania_id', $campania_id)
                                        ->whereNull('asignaciones.vendedor_id')
                                        ->get();
    
            
            return view('campania.ajaxListadoOportunidades')->with(compact('oportunidades'));

        }else{
        
        }


    }

    public function ajaxListadoVendedores(Request $request){

        if($request->ajax()){

            // $campania_id = $request->input('campania');

            // $vendedores = Vendedor::select('vendedores.id','vendedores.nombres', 'vendedores.apellido_paterno', 'vendedores.apellido_materno')
            //                         ->join('asignaciones', 'vendedores.id', '=', 'asignaciones.vendedor_id')
            //                         ->join('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
            //                         ->where('oportunidades.campania_id',$campania_id)
            //                         ->groupBy('vendedores.id')
            //                         ->get();

            $vendedores = Vendedor::all();

            return view('campania.ajaxListadoVendedores')->with(compact('vendedores'));

        }else{
        
        }

    }

    public function ajaxListadoClientesAsignados(Request $request){

        if($request->ajax()){

            $campania_id = $request->input('campania');

            $clientesAsigandos  = Asignacion::select('personas.nombres', 'personas.apellido_paterno', 'personas.apellido_materno', 'vendedores.nombres as nombrev', 'vendedores.apellido_paterno as appaternov', 'vendedores.apellido_materno as apmaternov', 'asignaciones.id as id_asignacion', 'oportunidades.id as id_oportunidades')
                                            ->join('oportunidades', 'oportunidades.id', '=', 'asignaciones.oportunidad_id')
                                            ->join('personas', 'personas.id', '=', 'oportunidades.persona_id')
                                            ->join('vendedores','vendedores.id', '=','asignaciones.vendedor_id')
                                            ->where('oportunidades.campania_id',$campania_id)
                                            ->where('asignaciones.estado',1)
                                            ->get();
    
            return view('campania.ajaxListadoClientesAsignados')->with(compact('clientesAsigandos'));

        }else{
        
        }


    }

    public function ajaxListadoSeguimientos(Request $request){

        if($request->ajax()){

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

        }else{
        
        }


    }

    public function ajaxListadoVendedorTramsferencia(Request $request){

        if($request->ajax()){

            $vendedores = Vendedor::all();

            return view('campania.ajaxListadoVendedorTramsferencia')->with(compact('vendedores'));

        }else{
        
        }

    }

    public function tramsferirOportunidadVendedor(Request $request){   
        
        if($request->ajax()){

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

        }else{
        
        }


    }

    public function guardaIngreso(Request $request){

        if($request->ajax()){

            $campania_id = $request->input('campania_id_ingreso');
            
            $presupuesto = new Presupuesto();

            $presupuesto->campania_id   = $campania_id;
            $presupuesto->ingreso       = $request->input('monto_ingreso');
            $presupuesto->fecha         = date('Y-m-d H:i:s');
            $presupuesto->tipo          = "Ingreso";
            $presupuesto->egreso       = 0;
            $presupuesto->descripcion   = $request->input('descripcion_ingreso');
    
            $presupuesto->save();

        
            $ingresos = Campania::ingresos($campania_id);

            $lista = '';

            $utilidades = new Utilidades();

            foreach ($ingresos as $ing){
                
                $fechaHoraEs = $utilidades->fechaHoraCastellano($ing->fecha);

                $lista = $lista .'
                                <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                                    <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center"><i class="material-icons text-lg">expand_less</i></button>
                                        <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">'.$ing->descripcion.'</h6>
                                        <span class="text-xs">
                                            '.$fechaHoraEs.'
                                        </span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold ms-auto">
                                        '.$ing->ingreso.' Bs.
                                    </div>
                                    </div>
                                    <hr class="horizontal dark mt-3 mb-2" />
                                </li>
                                ';
            }

            $html['lista'] = $lista;

            $presupuestoActual = Campania::presupuestoActual($campania_id);

            $html['presupuesto'] = $presupuestoActual;

            return json_encode($html);
        }

    }

    public function guardaEgreso(Request $request){

        if($request->ajax()){

            $presupuesto_id = $request->input('presupuesto_id');

            if($presupuesto_id != 0){

                $presupuesto = Presupuesto::find($presupuesto_id);

            }else{
                
                $presupuesto = new Presupuesto();

            }

            $campania_id = $request->input('campania_id_egreso');

            $presupuesto->campania_id = $campania_id;
            $presupuesto->gasto_id    = $request->input('gasto_egreso');
            $presupuesto->egreso      = $request->input('monto_egreso');
            $presupuesto->fecha       = date('Y-m-d H:i:s');
            $presupuesto->tipo        = "Egreso";
            $presupuesto->descripcion = $request->input('descripcion_egreso');

            $presupuesto->save();


            $egresos = Campania::egresos($campania_id);


            // PROCEDEMOS AL SUBIDO DE ARCHIVO Y MODIFICACION DE DATOS DE LA BASE DE DATOS 
            $comprobante_id = $request->input('comprobante_id');

            if($comprobante_id != 0){

                $comprobante = Comprobante::find($comprobante_id);

            }else{

                $comprobante = new Comprobante();
                
            }

            if($request->has('comprobante')){
                // subiendo el archivo al servidor
                $archivo    = $request->file('comprobante');
                $direcion   = "imagenesComprobantes/";
                $nombreArchivo = date('YmdHis').".".$archivo->getClientOriginalExtension();
                $archivo->move($direcion,$nombreArchivo);

                $comprobante->nombre            = $nombreArchivo;
            }

            // GUARDANDO EL NOMBRE DEL ARCHIVO EN LA DATE BASE
            $comprobante->presupuesto_id    = $presupuesto->id;
            $comprobante->nro_comprobante   = $request->input('nro_comprobante');

            $comprobante->save();


            $lista = '';

            // $utilidades = new Utilidades();

            // foreach ($egresos as $egre){

            //     $comprobante = Comprobante::where('presupuesto_id', $egre->id)->first();

            //     if($comprobante){
            //         $numComprobante = $comprobante->nro_comprobante; 
            //         $idComprobante = $comprobante->id;
            //     }else{
            //         $numComprobante = '""'; 
            //         $idComprobante = 0;
            //     }
                
            //     $fechaHoraEs = $utilidades->fechaHoraCastellano($egre->fecha);
                
            //     $lista = $lista."
            //                     <li class='list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg'>
            //                         <div class='d-flex'>
            //                         <div class='d-flex align-items-center'>
            //                             <button onclick='editEgreso($egre->id, $egre->gasto_id, $egre->egreso,".'"'.$egre->descripcion.'"'.",$numComprobante, $idComprobante)' class='btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center'><i class='material-icons text-lg'>edit</i></button>
            //                             <div class='d-flex flex-column'>
            //                             <h6 class='mb-1 text-dark text-sm'>".$egre->gasto->nombre."</h6>
            //                             <span class='text-xs'>
            //                             $fechaHoraEs
            //                             </span>
            //                             </div>
            //                         </div>
            //                         <div class='d-flex align-items-center text-danger text-gradient text-sm font-weight-bold ms-auto'>
            //                             $egre->egreso Bs.
            //                         </div>
            //                         </div>
            //                         <hr class='horizontal dark mt-3 mb-2' />
            //                     </li>
            //                     ";
            // }

            // $html['lista'] = $lista;

            // $html['lista'] = view('campania.ajaxListadoEgreso')->with(compact('egresos'));
            $html['lista'] = view('campania.ajaxListadoEgreso', compact('egresos'))->render();

            $presupuestoActual = Campania::presupuestoActual($campania_id);

            $html['presupuesto'] = $presupuestoActual;

            return json_encode($html);

        }
    }

    public function balanceGeneral(Request $request, $campania_id){
        
        // PRESUPUESTO ACTUAL
        $presupuesto = Campania::presupuestoActual($campania_id);

        // PRESUPUESTO POR GASTOS TOTALES
        $gastosTotales = Campania::tiposGasto($campania_id);

        // TOTAL INGRESO
        $totalIngreso = Campania::totalIngresoEgreso($campania_id, "Ingreso");
        
        // TOTAL EGRESO
        $totalEgreso = Campania::totalIngresoEgreso($campania_id, "Egreso");

        // INGRESOS POR SEPARADOS
        $ingresos = Campania::ingresos($campania_id);
                                
        // EGRESOS POR SEPARADOS
        $egresos = Campania::egresos($campania_id);

        return view('campania.balanceGeneral')->with(compact('presupuesto', 'gastosTotales', 'totalIngreso', 'totalEgreso', 'ingresos' ,'egresos'));
    }

    public function estadistica(Request $request, $campania_id, $formulario_id){

        // dd($request->all());

        $preguntas  = Campania::preguntasCombo($formulario_id);

        $campania   = Campania::find($campania_id);
        $formulario =  Formulario::find($formulario_id);

        $preguntasFormulario = Campania::preguntasFormulario($formulario_id);

        $oportunidades = Campania::oportunidades($formulario_id);

        // DEVOLVEREMOS EL JSON DE LAS REDES SOCIALES
        $redesSociales = Campania::redesSocialesNombre();
        
        // DEVOLVELMENOS UN JSON LA CANTIDAD DE DE REDES SOCILLES DE CADA FORMULARIO
        $canRedSocial = Campania::canRedSocial($campania_id, $formulario_id);


        return  view('campania.estadistica')->with(compact('preguntas', 'campania', 'formulario', 'preguntasFormulario', 'oportunidades', 'redesSociales', 'canRedSocial'));
    }

    public function respuestaExcel(Request $request, $campania_id, $formulario_id){

        $formulario = Formulario::find($formulario_id);

        $campania = Campania::find($campania_id);
        $preguntas = Campania::preguntasFormulario($formulario_id);
        $oportunidades = Campania::oportunidades($formulario_id);

        // generacion del excel
        $fileName = str_replace(" ", '_',$formulario->nombre).'.xlsx';

        $libro = new Spreadsheet();

        $hoja = $libro->getActiveSheet();
        
        $hoja->setCellValue('A1', 'REPORTE DE PREGUNTAS');
        $hoja->setCellValue('A2', 'NOMBRE');

        $inicio = 66;

        $valor = chr($inicio);

        foreach ($preguntas as $pre){

            $valor = chr($inicio);

            $hoja->setCellValue($valor."2", $pre->nombre);

            $inicio++;

        }

        $contadorIni = 3; 

        foreach($oportunidades as $opor){

            $hoja->setCellValue("A$contadorIni", $opor->persona->nombres." ".$opor->persona->apellido_paterno." ".$opor->persona->apellido_materno);


            $respuestas = Respuesta::where('oportunidad_id',$opor->id)->get();

            $iniRes = 66;

            foreach($respuestas as $res){

                if($res->pregunta){

                    $valor = chr($iniRes);

                    $hoja->setCellValue("$valor$contadorIni", $res->respuesta);
    
                    $iniRes++;

                }

            }

            $contadorIni++;


        }

        $letraFin = chr($iniRes-1);

        $libro->getActiveSheet()->mergeCells("A1:".$letraFin."1");

        // $fuenteNegritaTitulo = array(
        // 'font'  => array(
        //     'bold'  => true,
        //     // 'color' => array('rgb' => 'FF0000'),
        //     'size'  => 20,
        //     // 'name'  => 'Verdana'
        // ));

        // $libro->getActiveSheet()->getStyle("A1")->applyFromArray($fuenteNegritaTitulo);

        // $estilobor = $contador-1;

        // $libro->getActiveSheet()->getStyle("A2:G$estilobor")->applyFromArray(
        //     array(
        //         'borders' => array(
        //             'allBorders' => array(
        //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        //                 'color' => array('argb' => '000000')
        //             )
        //         )
        //     )
        // );

        // $fuenteNegrita = array(
        // 'font'  => array(
        //     'bold'  => true,
        // ));

        // $libro->getActiveSheet()->getColumnDimension('C')->setWidth(50);
        // $libro->getActiveSheet()->getColumnDimension('D')->setWidth(20);
        // $libro->getActiveSheet()->getColumnDimension('E')->setWidth(70);
        // $libro->getActiveSheet()->getColumnDimension('F')->setWidth(50);
        // $libro->getActiveSheet()->getColumnDimension('G')->setWidth(17);

        
        $inicio = 65;
        $cantidadPeguntas = count($preguntas);

        for ($i = 1 ; $i <= ($cantidadPeguntas+1) ; $i++){
            
            $valor = chr($inicio);

            $libro->getActiveSheet()->getColumnDimension("$valor")->setWidth(35);

            $inicio++;

        }
        // $libro->getActiveSheet()->getStyle('A2:G2')->applyFromArray($fuenteNegrita);

        $style = array(
            'alignment' => array(
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            )
        );

        // $hoja->getStyle("A1")->applyFromArray($style);
        $hoja->getStyle("A1")->applyFromArray($style);
        $hoja->getStyle("A2:".$letraFin."2")->applyFromArray($style);

        // exportamos el excel
        $writer = new Xlsx($libro);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');

        // // $writer->save('hola.xlsx');
        $writer->save('php://output');
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
