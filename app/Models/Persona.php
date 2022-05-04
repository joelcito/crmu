<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Persona extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombres',
        'apellido_paterno',
        'apellido_materno',
        'email',
        'celular',
        'cedula',
        'expedido',
        'edad',
        'estado',
        'deleted_at',
    ];

}
