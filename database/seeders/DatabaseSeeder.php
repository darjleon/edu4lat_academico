<?php

namespace Database\Seeders;

use App\Models\Activities_type;
use App\Models\User;
use App\Models\Area;
use App\Models\Grade;
use App\Models\Course;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'daniel@gmail.com'
        ]);
        User::factory()->create([
            'email' => 'jose@gmail.com'
        ]);
        User::factory()->create([
            'email' => 'maria@gmail.com'
        ]);
        User::factory()->create([
            'email' => 'pepe@gmail.com'
        ]);
        User::factory()->create([
            'email' => 'mario@gmail.com'
        ]);

        Course::create([
            'nombre' => 'Alfa',
        ]);

        Course::create([
            'nombre' => 'Omega',
        ]);

        Course::create([
            'nombre' => 'Gama',
        ]);

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

        Activities_type::create([
            'nombre' => 'Verdadero o Falso',
            'descripcion' => 'El enunciado es verdadero o falso',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Escojer la opción correcta',
            'descripcion' => 'El enunciado es tiene una sola opcion correcta',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Escojer las opciones correctas',
            'descripcion' => 'El enunciado puede tener mas de una sola opcion correcta',
            'tipo' => 'seleccionar'
        ]);

        Activities_type::create([
            'nombre' => 'Responda la pregunta',
            'descripcion' => 'Debe responder la pregunta en cuestion',
            'tipo' => 'escrito'
        ]);

        Activities_type::create([
            'nombre' => 'Relacionar palabras',
            'descripcion' => 'Debe relacionar correctamente los enunciados, palabras, etc ',
            'tipo' => 'otros'
        ]);
    }
}
