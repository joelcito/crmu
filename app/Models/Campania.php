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

    public static function ingresos($campania_id){
        
        $ingresos = Presupuesto::where('campania_id',$campania_id)
                                ->where('tipo',"Ingreso")
                                ->get();

        return $ingresos;

    }

    public static function egresos($campania_id){
        
        $egresos = Presupuesto::where('campania_id',$campania_id)
                                ->where('tipo',"Egreso")
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
    
}
