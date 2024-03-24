<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=>$this->faker->sentence(2),
            'contenido'=>$this->faker->paragraph(2),
            'user_id'=>$this->faker->numberBetween(1,11),
            'estado_moderacion'=>$this->faker->randomElement(['aprobado','en revision']),
            'semestre'=>$this->faker->randomElement(['1','2','3','4','5','6','7','8','9','10','all']),
        ];
    }
}
