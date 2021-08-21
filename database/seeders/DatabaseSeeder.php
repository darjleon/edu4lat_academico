<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activities_type;
use App\Models\User;
use App\Models\Area;
use App\Models\Book;
use App\Models\Grade;
use App\Models\Course;
use App\Models\Institution;
use RolesYPermisos;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* Creacion de roles y permisos */

        $this->call(RolesPermisosSeeder::class);

        /* Creacion de usuarios y sus roles */

        $profesor = User::factory()->create([
            'name' => 'Jose jose',
            'email' => 'jose@camp.academy'
        ]);
        $profesor->assignRole('Estudiante');

        $profesor = User::factory()->create([
            'name' => 'Pepe pepin',
            'email' => 'pepe@camp.academy'
        ]);
        $profesor->assignRole('Estudiante');

        $profesor = User::factory()->create([
            'name' => 'Fernando Gutierrez',
            'email' => 'f.g@camp.academy'
        ]);
        $profesor->assignRole('Docente');

        $profesor2 = User::factory()->create([
            'name' => 'Kevin Romero',
            'email' => 'k.r@camp.academy'
        ]);
        $profesor2->assignRole('Docente');

        $profesor3 = User::factory()->create([
            'name' => 'Erick Nuñez',
            'email' => 'ErickN@camp.academy'
        ]);
        $profesor3->assignRole('Docente');

        $coordinador = User::factory()->create([
            'name' => 'Darwin Leon',
            'email' => 'djlramos93@gmail.com'
        ]);
        $coordinador->assignRole('Coordinador');

        $admin2 = User::factory()->create([
            'name' => 'Daniel Alvarado',
            'email' => 'daniel@gmail.com'
        ]);
        $admin2->assignRole('Administrador');

        /* Creacion de institución */

        $institucion = Institution::create([
            'nombre' => 'Academia CAMP',
        ]);

        /* Creacion de cursos */

        Course::create([
            'institucion_id' => $institucion->id,
            'nombre' => 'Programción Kids 0',
            'coordinador_id' => $coordinador->id,
        ]);

        /* Creacion de libros */

        Book::create([
            'titulo' => 'Programación en Scratch',
            'area' => 'Programación',
            'nivel' => '7mo grado',
        ]);

        Book::create([
            'titulo' => 'Matemáticas',
            'area' => 'Matemáticas',
            'nivel' => '2do grado',
        ]);

        Book::create([
            'titulo' => 'Ciencias Naturales',
            'area' => 'Ciencias Naturales',
            'nivel' => '2do grado',
        ]);

        Book::create([
            'titulo' => 'Lengua y Literatura',
            'area' => 'Lengua y Literatura',
            'nivel' => '2do grado',
        ]);

        Book::create([
            'titulo' => 'Ciencias Sociales',
            'area' => 'Ciencias Sociales',
            'nivel' => '2do grado',
        ]);

        /* Creacion de areas */

        Area::create([
            'nombre' => 'Programación',
            'descripcion' => 'Es el proceso de tomar un algoritmo y codificarlo en una notación',
        ]);

        Area::create([
            'nombre' => 'Matematicas',
            'descripcion' => 'Los números son los unicos que no te mienten en esta vida ',
        ]);

        Area::create([
            'nombre' => 'Lengua y Literatura',
            'descripcion' => 'Para que tu labia sea tan poderosa, como para que seas presidente',

        ]);

        Area::create([
            'nombre' => 'Ciencias Sociales',
            'descripcion' => 'No recuerdo que vi estas area',

        ]);

        Area::create([
            'nombre' => 'Ciencias Naturales',
            'descripcion' => 'Para que tu conección con la madre tierra sea esperitual... A otro nivel ;)',
        ]);

        /* Creacion de grados/niveles */

        Grade::create([
            'nombre' => '2do grado',
        ]);

        Grade::create([
            'nombre' => '3ero grado',
        ]);

        Grade::create([
            'nombre' => '4to grado',
        ]);

        Grade::create([
            'nombre' => '5to grado',
        ]);

        Grade::create([
            'nombre' => '6to grado',
        ]);

        Grade::create([
            'nombre' => '7mo grado',
        ]);

        Grade::create([
            'nombre' => '8vo grado',
        ]);

        Grade::create([
            'nombre' => '9no grado',
        ]);
        Grade::create([
            'nombre' => '10mo grado',
        ]);

        /* Creacion de tipos de actividades */

        Activities_type::create([
            'nombre' => 'Verdadero o Falso',
            'descripcion' => 'El enunciado es verdadero o falso',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Respuesta única',
            'descripcion' => 'El enunciado es tiene una sola opcion correcta',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Respuesta múltiple',
            'descripcion' => 'El enunciado puede tener mas de una sola opcion correcta',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Dar respuesta',
            'descripcion' => 'Debe responder la pregunta en cuestion',
            'tipo' => 'escrito'
        ]);

        Activities_type::create([
            'nombre' => 'Relación única',
            'descripcion' => 'Debe relacionar correctamente los enunciados, palabras, etc ',
            'tipo' => 'otros'
        ]);

        Activities_type::create([
            'nombre' => 'Completar',
            'descripcion' => 'Debe llenar los espacios en blanco con la frase correcta ',
            'tipo' => 'escrito'
        ]);

        /* Creacion de Pruebas */

        $this->call(QuizSeeder::class);

        /* Creacion de Actividades 
        
        $this->call(ActivitiesSeeder::class);

        */

        /* Creacion de relaciones */

        $this->call(RelationSeeder::class);
    }
}
