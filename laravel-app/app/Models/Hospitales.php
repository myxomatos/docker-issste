<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospitales extends Model
{
    use HasFactory;
    protected $table = 'hospitales';

    protected $fillable = [
        'id',
        'nombre',
        'descripcion',
        'status',
        'user_id',

    ];
    public function user()
    {
        return $this->hasOne('App\Models\User', 'subcordinador_id', 'id');
    }

}
