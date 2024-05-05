<?php

namespace Database\Factories;

use App\Models\Listas;
use Illuminate\Database\Eloquent\Factories\Factory;

class ListasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'nombre_juego' => $this->faker->word,
            'precio' => $this->faker->randomFloat(2, 0, 100),
            'oferta' => $this->faker->boolean,
            'disponible' => $this->faker->boolean,
        ];
    }
}
