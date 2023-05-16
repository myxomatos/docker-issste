<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Censos extends Model
{
    use HasFactory;
    protected $table = 'censos';

    protected $fillable = [
        'id',
        'nombre',
        'apellidos',
        'genero',
        'telefono',
        'edad',
        'status',
        'hospital_id',

    ];

    public function hospitales()
    {
        return $this->belongsTo('App\Models\Hospitales', 'hospital_id', 'id');
    }
}
