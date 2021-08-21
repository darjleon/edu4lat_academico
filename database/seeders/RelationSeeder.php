<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Course;
use App\Models\Course_Book;
use App\Models\Course_User;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Relaciones para el curso de Progración kids 0  */
        $curso = Course::where('id', 1)->First();

        /* Estudiantes-curso  */
        $estudiantes = User::role('Estudiante')->get();

        foreach ($estudiantes as $estudiante) {
            Course_User::create([
                'curso_id' => $curso->id,
                'usuario_id' => $estudiante->id,
            ]);
        }

        /* Libro-curso  */
        $libro = Book::where('id', 1)->First();
        $docente = User::where('email', 'ErickN@camp.academy')->First();

        Course_Book::create([
            'curso_id' => $curso->id,
            'libro_id' => $libro->id,
            'docente_id' => $docente->id,
        ]);
    }
}
