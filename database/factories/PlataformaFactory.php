<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Plataforma;
use Faker\Generator as Faker;

class PlataformaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_plataforma' => $this->faker->name(),
            'tipo_plataforma' => $this->faker->word(),
        ];
    }
}
