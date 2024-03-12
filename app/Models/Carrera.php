<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function centros(){
        return $this->belongsToMany(Centro::class,'centro-carreras');
    }

    public function comunidades(){
        return $this->belongsToMany(Comunidad::class,'comunidad_carreras');
    }
}
