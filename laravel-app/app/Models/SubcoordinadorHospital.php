<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubcoordinadorHospital extends Model
{
    use HasFactory;
    protected $table = 'user_hospital';

    protected $fillable = [
        'id',
        'hospital_id',
        'user_id',

    ];
}
