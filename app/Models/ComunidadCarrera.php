<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComunidadCarrera extends Model
{
    use HasFactory;

    protected $table = 'comunidad_carreras';

    protected $fillable = [
        'comunidad_id',
        'centro_carrera_id',
    ];
    
    public function comunidad(){
        return $this->belongsTo(Comunidad::class);
    }

    public function centroCarrera(){
        return $this->belongsTo(CentroCarrera::class);
    }
}
