<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asignacion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "asignaciones";

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'vendedor_id',
        'oportunidad_id',
        'estado_final_id',
        'fecha_asignacion',
        'dias_asignacion',
        'estado',
        'deleted_at',
    ];

    public function vendedor(){

        return $this->belongsTo('App\Models\Vendedor', 'vendedor_id');

    }
}
