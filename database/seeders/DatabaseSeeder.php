<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Activities_type;
use App\Models\User;
use App\Models\Area;
use App\Models\Grade;
use App\Models\Course;
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

        $estudiante = User::factory()->create([
            'email' => 'daniel@gmail.com'
        ]);
        $estudiante->assignRole('Estudiante');


        $profesor = User::factory()->create([
            'email' => 'jose@gmail.com'
        ]);
        $profesor->assignRole('Docente');


        $coordinador = User::factory()->create([
            'email' => 'maria@gmail.com'
        ]);
        $coordinador->assignRole('Coordinador');


        $admin = User::factory()->create([
            'email' => 'pepe@gmail.com'
        ]);
        $admin->assignRole('Administrador');

        /* Creacion de cursos */

        Course::create([
            'nombre' => 'Alfa',
        ]);

        Course::create([
            'nombre' => 'Omega',
        ]);

        Course::create([
            'nombre' => 'Gama',
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
            'nombre' => 'Escojer la opcion correcta',
            'descripcion' => 'El enunciado es tiene una sola opcion correcta',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Escojer las opciones correctas',
            'descripcion' => 'El enunciado puede tener mas de una sola opcion correcta',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Responder la pregunta',
            'descripcion' => 'Debe responder la pregunta en cuestion',
            'tipo' => 'escrito'
        ]);

        Activities_type::create([
            'nombre' => 'Relacionar las palabras',
            'descripcion' => 'Debe relacionar correctamente los enunciados, palabras, etc ',
            'tipo' => 'otros'
        ]);

        Activities_type::create([
            'nombre' => 'Completar la frase',
            'descripcion' => 'Debe llenar los espacios en blanco con la frase correcta ',
            'tipo' => 'escrito'
        ]);
    }
}
