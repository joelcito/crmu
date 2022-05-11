<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presupuesto extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'campania_id',
        'gasto_id',
        'ingreso',
        'egreso',
        'candidad',
        'fecha',
        'estado',
        'descripcion',
        'deleted_at',
    ];

    public function gasto()
    {
        return $this->belongsTo('App\Models\Gasto', 'gasto_id');
    }

    public function comprbante(){

        return $this->hasMany('App\Models\Comprobante');
        
    }

}
