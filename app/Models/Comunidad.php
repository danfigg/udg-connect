<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function carreras(){
        return $this->belongsToMany(Carrera::class,'comunidad_carreras');
    }

    public function usuarios(){
        $this->belongsToMany(Comunidad::class,'comunidad_users');
    }
}
