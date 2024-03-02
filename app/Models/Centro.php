<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Centro extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function carreras(){
        return $this->belongsToMany(Carrera::class,'centro-carreras');
    }
}
