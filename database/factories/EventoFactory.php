<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evento>
 */
class EventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "nombre"=>$this->faker->sentence(3),
            "descripcion"=>$this->faker->paragraph(2),
            "fecha_hora_evento"=>$this->faker->dateTimeBetween("-1 month", "+1 month"),
            "user_id"=>$this->faker->numberBetween(1, 11),
            "comunidad_id"=>$this->faker->numberBetween(1, 30),
            "duracion_horas"=>$this->faker->numberBetween(1, 5),
            "estado_moderacion"=>"aprobado",
        ];
    }
}
