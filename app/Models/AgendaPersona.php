<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgendaPersona extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        'creador_id',
        'modificador_id',
        'eliminador_id',
        'agenda_id',
        'persona_id',
        'estado',
        'deleted_at',
    ];

    public function agenda(){

        return $this->belongsTo('App\Models\Agenda', 'agenda_id');
        // return $this->hasMany('App\Models\Agenda');

    }

}
