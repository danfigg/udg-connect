<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'banner',
        'fecha_hora_evento',
        'user_id',
        'comunidad_id',
        'estado_moderacion',
    ];

    public function participantes(){
        return  $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comunidad(){
        return $this->belongsTo(Comunidad::class);
    }
}
