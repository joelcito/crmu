<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vendedor extends Model
{
    use HasFactory;
    
    use SoftDeletes;

    protected $table = 'vendedores';

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'cedula',
        'celular',
        'email',
        'estado',
        'deleted_at',
    ];

    public function holas(){

        // $r = "holas";
        // return $r;
        
    }

}
