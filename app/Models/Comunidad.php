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
        'estado_comunidad',
        'user_id',
        'centro_id',
    ];

    
    public function carreras(){
        return $this->belongsToMany(CentroCarrera::class,'comunidad_carreras');
    }

    public function centro(){
        return $this->belongsTo(Centro::class);
    }

    public function usuarios(){
        return $this->belongsToMany(User::class,'comunidad_users');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
