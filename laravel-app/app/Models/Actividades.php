<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    use HasFactory;
    protected $table = 'actividades';

    protected $fillable = [
        'id',
        'nombre',
        'status',
        'descripcion_actividad',
        'descripcion_subactividad',
        'notas',
        'user_id',
        'hospital_id',
        'created_at'

    ];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
