<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reportes extends Model
{
    use HasFactory;
    protected $table = 'reportes';

    protected $fillable = [
        'id',
        'nombre',
        'status',
        'descripcion_actividad',
        'descripcion_subactividad',
        'user_id',
        'hospital_id',
        'created_at',
        'fecha'

    ];
}
