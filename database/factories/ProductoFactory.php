<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'categoria_id' => 1,
            'cantidad' => $this->faker->numberBetween(1, 20),
            'estado' => 'disponible',
        ];
    }
}
