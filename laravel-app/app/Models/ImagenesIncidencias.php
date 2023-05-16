<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenesIncidencias extends Model
{
    use HasFactory;
    protected $table = 'incidencias_imagenes';
    protected $fillable = [
'actividad_id',
        'incidencia_id',
        'img',
    ];
}