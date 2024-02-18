<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    use HasFactory;
    protected $table = 'comunidades';

    protected $fillable = [
        'nombre',
        'descripcion',
        'reglas',
        'banner',
        'estado_comunidad'
    ];

    protected $attributes = [
        'num_participantes' => 0,
    ];
}
