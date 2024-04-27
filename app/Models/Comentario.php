<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cuerpo',
        'user_id',
        'post_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comentable(){
        return $this->morphTo();
    }

    public function comentario(){
        return $this->belongsTo(Comentario::class);
    }

    public function comentarios(){
        return $this->morphMany(Comentario::class,'comentable');
    }

    public function votos(){
        return $this->morphMany(Voto::class,'votable');
    }

    public function sum_votos(){
        return $this->votos()->where('estado','positivo')->count() - $this->votos()->where('estado','negativo')->count();
    }
}
