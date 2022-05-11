<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Configuracion extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "Configuraciones";

    protected $fillable = [

        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombre',
        'valor',
        'descripcion',
        'estado',
        'deleted_at',

    ];
}