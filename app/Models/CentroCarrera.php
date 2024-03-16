<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroCarrera extends Model
{
    use HasFactory;

    public $fillable = [
        'centro_id',
        'carrera_id',
    ];
    
}

