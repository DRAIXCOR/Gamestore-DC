<?php

namespace Database\Seeders;

use App\Models\Juegos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Juegos::factory(10)->create();
    }
}
