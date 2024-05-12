<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{   
    protected $casts = [
        'fecha_hora_evento' => 'datetime',
    ];

    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'banner',
        'fecha_hora_evento',
        'user_id',
        'comunidad_id',
        'estado_moderacion',
        'duracion_horas',
    ];

    public function imagen(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function participantes(){
        return  $this->belongsToMany(User::class,'user_eventos');
    }

    public function calculate_finish_hour(){
        return $this->fecha_hora_evento->addHours($this->duracion_horas)->format('H:i');
    }

    public function start_hour(){
        return $this->fecha_hora_evento->format('H:i');
    }

    public function range_hours($separador=' - '){
        return $this->start_hour() . $separador . $this->calculate_finish_hour();
    }

    public function is_past(){
        return $this->fecha_hora_evento->isPast();
    }

    public function is_future(){
        return $this->fecha_hora_evento->isFuture();
    }

    public function is_today(){
        return $this->fecha_hora_evento->isToday();
    }

    public function date(){
        return $this->fecha_hora_evento->format('d/m/Y');
    }

    public function short_description(){
        return substr($this->descripcion, 0, 10) . '...';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comunidad(){
        return $this->belongsTo(Comunidad::class);
    }
}
