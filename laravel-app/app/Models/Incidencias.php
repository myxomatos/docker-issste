<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencias extends Model
{
    use HasFactory;
    protected $table = 'incidencias';

    protected $fillable = [
        'id',
        'cargar_evidencia',
        'nombre',
        'notas',
        'user_id',
        'hospital_id',
        'actividad_id',
        'status',

    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

}
