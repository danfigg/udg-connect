<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
              'nombre'=>$this->nombre,
              'descripcion'=>$this->descripcion,
              'user'=>$this->user,
              'comunidad'=>$this->comunidad,
              'estado_moderacion'=>$this->estado_moderacion,
              'fecha_hora_evento'=>$this->fecha_hora_evento,
              'duracion_horas'=>$this->duracion_horas,
        ];
    }
}
