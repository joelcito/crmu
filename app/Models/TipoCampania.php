<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoCampania extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $fillable = [
        
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'campania_id',
        'nombre',
        'descripcion',
        'estado',
        'deleted_at'

    ];
}
