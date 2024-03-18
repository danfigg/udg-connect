<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'semestre',
        'user_id',
        'comunidad_id',
    ];

    // protected $guarded = [] list of properties protected mass assigment
    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public  function user() {
        return $this->belongsTo(User::class);
    }

    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class);
    }

    public function comunidad(){
        return $this->belongsTo(Comunidad::class);
    }
}
