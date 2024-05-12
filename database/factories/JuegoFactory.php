<?php

namespace Database\Factories;

use App\Models\Juegos;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JuegoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Juegos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_juego' => $this->faker->unique()->sentence(3),
            'genero' => $this->faker->word(),
            'edad' => $this->faker->numberBetween(0, 18),
            'plataforma' => $this->faker->randomElement(['PS4', 'Xbox One', 'Nintendo Switch', 'PC']),
            'precio' => $this->faker->randomFloat(2, 10, 100),
            'desarrolladora' => $this->faker->company(),
            'release_year' => $this->faker->year(),
        ];
    }
}
