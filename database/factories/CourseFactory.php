<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Course_Book;
use App\Models\Institution;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $institucion = Institution::pluck('id')->toArray();
        return [
            'institucion_id' => $this->faker->randomElement($institucion),
            'nombre' => $this->faker->sentence(1),
            'descripcion' => $this->faker->sentence(6),
        ];
    }
}
/* Course::factory()->has(Book::factory()->count(4),'libros')->create(); */