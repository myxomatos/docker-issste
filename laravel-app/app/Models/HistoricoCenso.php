<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoCenso extends Model
{
    use HasFactory;
    protected $table = 'historico_censo';

    protected $fillable = [
        'id',
        'censo_id',


    ];
}
