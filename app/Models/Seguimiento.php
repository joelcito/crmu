<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seguimiento extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'asignacion_id',
        'estado_seguimiento_id',
        'respuesta_seguimiento_id',
        'medio_seguimiento_id',
        'estado',
        'deleted_at',
    ];

    public function estado_seguimiento(){

        return $this->belongsTo('App\Models\EstadoSeguimiento', 'estado_seguimiento_id');

    }

    public function respuesta_seguimiento(){

        return $this->belongsTo('App\Models\RespuestaSeguimiento', 'respuesta_seguimiento_id');

    }

    public function medio_seguimiento(){

        return $this->belongsTo('App\Models\MedioSeguimiento', 'medio_seguimiento_id');

    }

    public function asignacion(){

        // return $this->hasMany('App\Models\Asignacion');
        return $this->belongsTo('App\Models\Asignacion', 'asignacion_id');

    }
}

