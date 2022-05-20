<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Respuesta extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'pregunta_id',
        'oportunidad_id',
        'respuesta',
        'estado',
        'deleted_at',
    ];

    public function pregunta(){

        return $this->belongsTo('App\Models\Pregunta', 'pregunta_id');

    }
}
