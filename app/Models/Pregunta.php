<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pregunta extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'formulario_id',
        'componente_id',
        'nombre',
        'requerido',
        'descripcion',
        'estado',
        'deleted_at',
    ];

    public function valoresCombo()
    {
        return $this->hasMany('App\Models\ValorCombo');
    }

    public function componente()
    {
        return $this->belongsTo('App\Models\Componente', 'componente_id');
    }
}
