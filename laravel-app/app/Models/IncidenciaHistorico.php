<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidenciaHistorico extends Model
{
    use HasFactory;
    protected $table = 'incidencia_historico';

    protected $fillable = [
        'id',
        'incidencia_id',
        'user_id',
        'comentario',
        'asignacion',
        'created_at',
        'update_at'

    ];
}
