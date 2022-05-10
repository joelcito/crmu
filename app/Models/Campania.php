<?php

namespace App\Models;

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
    
}
