<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoAgenda extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [

        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombre',
        'color',
        'descripcion',
        'estado',
        'deleted_at',
        
    ];

}
