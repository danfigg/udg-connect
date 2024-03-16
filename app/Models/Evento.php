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
        'fecha_hora_evento'
    ];

    public function participantes(){
        return  $this->belongsToMany(User::class);
    }
}
