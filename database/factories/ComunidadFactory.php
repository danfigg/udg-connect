<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comunidad>
 */
class ComunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->sentence(3),
            'descripcion'=>$this->faker->text(100),
            'reglas'=>$this->faker->text(200),
            'estado_comunidad'=>$this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}
