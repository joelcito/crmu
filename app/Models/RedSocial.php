<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RedSocial extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "red_sociales";

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombre',
        'abreviacion',
        'icono',
        'boton',
        'descripcion',
        'estado',
        'deleted_at',
    ];

    public static function red_sociales_busca_abreviacion($abreviacion){

        $redesSociales = RedSocial::where('abreviacion',$abreviacion)
                                ->first();

        return $redesSociales;

    }
}
