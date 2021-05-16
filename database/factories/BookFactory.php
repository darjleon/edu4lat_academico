<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
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
        $docente = User::role('Docente')->pluck('id')->toArray();
        return [
            'docente_id' => $this->faker->randomElement($docente),
            'titulo' => $this->faker->sentence(2),
            'descripcion' => $this->faker->sentence(6),
        ];
    }
}
