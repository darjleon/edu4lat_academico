<?php

namespace Database\Seeders;

use App\Models\Activities_type;
use App\Models\User;
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
