<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Course;
use App\Models\Course_Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class Course_BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course_Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'curso_id' => Course::factory()->create()->id,
            'libro_id' =>  Book::factory()->create()->id,
        ];
    }
}
