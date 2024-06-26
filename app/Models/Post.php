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
        'estado_moderacion',
    ];

    // protected $guarded = [] list of properties protected mass assigment
    public function comentarios(){
        return $this->morphMany(Comentario::class,'comentable');
    }

    public function votos(){
        return $this->morphMany(Voto::class,'votable');
    }

    public function sum_votos(){
        return $this->votos()->where('estado','positivo')->count() - $this->votos()->where('estado','negativo')->count();
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function etiquetas(){
        return $this->belongsToMany(Etiqueta::class,"post_etiquetas");
    }

    public function comunidad(){
        return $this->belongsTo(Comunidad::class);
    }

    public function attachments(){
        return $this->morphMany(File::class,'fileable');
    }
}
