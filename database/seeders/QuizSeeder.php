<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Pruebas para el libro de programación en Scratch  */

        $libroProgramar = Book::where('id', 1)->First();
        $Admin = User::role('Administrador')->First();
        Quiz::create([
            'libro_id' => $libroProgramar->id,
            'creador_id' => $Admin->id,
            'area' => $libroProgramar->area,
            'nivel' => $libroProgramar->nivel,
            'titulo' => 'Introducción',
            'descripcion' => 'Debe responder las preguntas acorde su criterio',
        ]);

        Quiz::create([
            'libro_id' => $libroProgramar->id,
            'creador_id' => $Admin->id,
            'area' => $libroProgramar->area,
            'nivel' => $libroProgramar->nivel,
            'titulo' => 'Entorno',
            'descripcion' => 'Debe responder las preguntas acorde su criterio',
        ]);

        Quiz::create([
            'libro_id' => $libroProgramar->id,
            'creador_id' => $Admin->id,
            'area' => $libroProgramar->area,
            'nivel' => $libroProgramar->nivel,
            'titulo' => 'Primeros pasos',
            'descripcion' => 'Debe responder las preguntas acorde su criterio',
        ]);

        Quiz::create([
            'libro_id' => $libroProgramar->id,
            'creador_id' => $Admin->id,
            'area' => $libroProgramar->area,
            'nivel' => $libroProgramar->nivel,
            'titulo' => 'Mi primer proyecto',
            'descripcion' => 'Debe responder las preguntas acorde su criterio',
        ]);
    }
}
