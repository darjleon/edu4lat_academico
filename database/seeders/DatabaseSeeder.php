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
            'name' => 'Fernando Gutierrez',
            'email' => 'f.g@camp.academy'
        ]);
        $profesor->assignRole('Docente');

        $profesor2 = User::factory()->create([
            'name' => 'Kevin Romero',
            'email' => 'k.r@camp.academy'
        ]);
        $profesor2->assignRole('Docente');

        $admin = User::factory()->create([
            'name' => 'Darwin Leon',
            'email' => 'djlramos93@gmail.com'
        ]);
        $admin->assignRole('Administrador');

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
            'nombre' => 'EAES',
        ]);

        /* Creacion de libros */

        Book::create([
            'docente_id' => $profesor->id,
            'titulo' => 'Matemáticas',
        ]);

        Book::create([
            'docente_id' => $profesor->id,
            'titulo' => 'Ciencias Naturales',
        ]);

        Book::create([
            'docente_id' => $profesor2->id,
            'titulo' => 'Lengua y Literatura',
        ]);

        Book::create([
            'docente_id' => $profesor2->id,
            'titulo' => 'Ciencias Sociales',
        ]);

        /* Creacion de areas */

        Area::create([
            'nombre' => 'Matematicas',
        ]);

        Area::create([
            'nombre' => 'Lengua y Literatura',
        ]);

        Area::create([
            'nombre' => 'Ciencias Sociales',
        ]);

        Area::create([
            'nombre' => 'Ciencias Naturales',
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
    }
}
