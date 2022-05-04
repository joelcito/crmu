<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Oportunidad extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $table = 'oportunidades';

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'formulario_id',
        'campania_id',
        'persona_id',
        'descripcion',
        'estado',
        'deleted_at',
    ];
}
