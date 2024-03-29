<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campania extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'url',
        'descripcion',
        'estado',
        'deleted_at',
    ];


    public static function listado(){
        
        $campania = Campania::orderBy('id', 'desc')->get();

        return $campania;
    }

    public static function ingresos($campania_id){
        
        $ingresos = Presupuesto::where('campania_id',$campania_id)
                                ->where('tipo',"Ingreso")
                                ->get();

        return $ingresos;

    }

    public static function egresos($campania_id){
        
        $egresos = Presupuesto::where('campania_id',$campania_id)
                                ->where('tipo',"Egreso")
                                ->orderBy('id', 'desc')
                                ->get();

        return $egresos;

    }

    public static function presupuestoActual($campania_id){

        $total = Presupuesto::selectRaw('SUM(ingreso) - SUM(egreso) AS total')
                                ->where('campania_id',$campania_id)
                                ->groupBy('campania_id')
                                ->first();

        if($total){

            return $total->total;

        }else{

            return 0;

        }

    }

    public static function tiposGasto($campania_id){

        $gastos = Presupuesto::select(DB::raw('sum(egreso) as TotalGastado, gasto_id'))
                            ->where('campania_id',$campania_id)
                            ->where('tipo',"Egreso")
                            ->groupBy('gasto_id')
                            ->get();

        if($gastos){

            return $gastos;
            
        }else{

            return 0;

        }

    }

    public static function totalIngresoEgreso($campania_id, $tipo){

        $campo = strtolower($tipo);

        $total = Presupuesto::select(DB::raw("sum($campo) as total"))
                                    ->where('campania_id', $campania_id)
                                    ->where('tipo', $tipo)
                                    ->first();

        if($total){

            return $total->total;

        }else{

            return 0;

        }
        
    }

    public static function cantPersonasRegistradas($campania_id){

        $cantidad = Oportunidad::select(DB::raw("count(persona_id) as cantidad"))
                                ->where('campania_id', $campania_id)
                                ->first();

        if($cantidad){
            return  $cantidad->cantidad;
        }else{
            return 0;
        }

    }

    public static function preguntasCombo($formulario_id){

        $preguntas = Pregunta::where('formulario_id', $formulario_id)
                            ->whereIn('componente_id',[3,4])
                            ->get();

        return $preguntas;

    }

    public function valoresCombo(){

        return $this->hasMany('App\Models\ValorCombo');
        
    }

    public static function preguntasFormulario($formulario_id){

        $preguntas = Pregunta::where('formulario_id', $formulario_id)
                            ->where('estado',0)
                            ->get();

        return $preguntas;
    }

    public static function oportunidades($formulario_id){

        $oportunidades = Oportunidad::where('formulario_id',$formulario_id)
                                        ->get();

        return $oportunidades;
    }

    public static function tiposAgenda(){

        $tiposAgenda = TipoAgenda::all();

        return $tiposAgenda;

    }

    public static function vendedoresAgenda(){

        $vendedores = Persona::WhereNotNull('vendedor_id')
                            ->get();


        return $vendedores;

    }

    public static function redesSocialesNombre(){

        $resdesSociales = RedSocial::select('nombre')
                                ->get();

        $arrayRedesSociales = array();

        foreach ($resdesSociales as $rs){

            array_push($arrayRedesSociales, $rs->nombre);

        }

        return $arrayRedesSociales;

    }

    public static function canRedSocial($campania_id, $formulario_id){

        $cantidadRedSociales = Oportunidad::select(DB::raw("count(oportunidades.red_social_id) as cantRS"),"red_sociales.nombre", "red_sociales.id")
                                            ->join('red_sociales','oportunidades.red_social_id','=', 'red_sociales.id')
                                            ->where('oportunidades.formulario_id', $formulario_id)
                                            ->where('oportunidades.campania_id', $campania_id)
                                            ->groupBy('oportunidades.red_social_id')
                                            ->get();    

        $arrayCantRedesSociales = array();

        foreach ($cantidadRedSociales as $rs){

            array_push($arrayCantRedesSociales, $rs->cantRS);

        }

        return $arrayCantRedesSociales;

    }
    
}
