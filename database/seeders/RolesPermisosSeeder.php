<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reseteo de cache de roles y permisos
        app()['cache']->forget('spatie.permission.cache');

        // creacion de permisos
        Permission::create(['name' => 'Ver_usuario']);
        Permission::create(['name' => 'Crear_usuario']);
        Permission::create(['name' => 'Editar_usuario']);
        Permission::create(['name' => 'Eliminar_usuario']);

        Permission::create(['name' => 'Ver_institución']);
        Permission::create(['name' => 'Editar_institución']);

        Permission::create(['name' => 'Ver_curso']);
        Permission::create(['name' => 'Crear_curso']);
        Permission::create(['name' => 'Editar_curso']);
        Permission::create(['name' => 'Eliminar_curso']);
        Permission::create(['name' => 'Asignar_libro']);

        Permission::create(['name' => 'Ver_libro']);
        Permission::create(['name' => 'Crear_libro']);
        Permission::create(['name' => 'Editar_libro']);
        Permission::create(['name' => 'Eliminar_libro']);

        Permission::create(['name' => 'Ver_prueba']);
        Permission::create(['name' => 'Crear_prueba']);
        Permission::create(['name' => 'Editar_prueba']);
        Permission::create(['name' => 'Eliminar_prueba']);
        Permission::create(['name' => 'Asignar_actividad']);

        Permission::create(['name' => 'Ver_actividad']);
        Permission::create(['name' => 'Crear_actividad']);
        Permission::create(['name' => 'Editar_actividad']);
        Permission::create(['name' => 'Eliminar_actividad']);

        Permission::create(['name' => 'Ver_area']);
        Permission::create(['name' => 'Crear_area']);
        Permission::create(['name' => 'Editar_area']);
        Permission::create(['name' => 'Eliminar_area']);

        Permission::create(['name' => 'Resolver_prueba']);
        Permission::create(['name' => 'Ver_estadisticas']);

        // creacion de roles y con sus permisos

        $role = Role::create(['name' => 'Estudiante']);
        $role->syncPermissions([
            'Ver_institución', 'Ver_curso',
            'Ver_libro', 'Resolver_prueba', 'Ver_estadisticas'
        ]);

        $role = Role::create(['name' => 'Docente']);
        $role->syncPermissions([
            'Ver_institución', 'Ver_curso',
            'Ver_libro', 'Resolver_prueba', 'Ver_estadisticas',
            'Crear_actividad', 'Crear_prueba',
            'Editar_prueba', 'Editar_actividad',
            'Asignar_actividad', 'Eliminar_actividad', 'Eliminar_prueba'
        ]);

        $role = Role::create(['name' => 'Coordinador']);
        $role->syncPermissions([
            'Ver_institución', 'Ver_curso',
            'Ver_libro', 'Resolver_prueba', 'Ver_estadisticas',
            'Editar_curso', 'Crear_actividad', 'Crear_prueba',
            'Crear_curso', 'Crear_libro',
            'Editar_libro', 'Editar_prueba', 'Editar_actividad',
            'Asignar_libro', 'Asignar_actividad', 'Eliminar_actividad',
            'Eliminar_prueba', 'Eliminar_libro'
        ]);

        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());
    }
}
