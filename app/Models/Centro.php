<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $fillable = ["nombre"];

    public function carreras(){
        return $this->belongsToMany(Carrera::class,'centro-carreras');
    }

    public function comunidades(){
        return $this->hasMany(Comunidad::class);
    }
}
