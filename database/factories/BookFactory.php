<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(2),
            'descripcion' => $this->faker->sentence(6),
            'area' => $this->faker->randomElement(['Matematicas', 'Ciencias Sociales', 'Ciencias Naturales', 'Lengua y Literatura']),
            'nivel' => $this->faker->randomElement(['2do grado', '3ero grado', '4to grado', '5to grado']),
        ];
    }
}
