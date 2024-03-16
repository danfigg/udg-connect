<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuerpo',
        'user_id',
        'post_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function comentario(){
        return $this->belongsTo(Comentario::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
