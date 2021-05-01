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

        /*      Permission::create(['name' => '']);
        Permission::create(['name' => '']);
        Permission::create(['name' => '']); */

        // creacion de roles y con sus permisos

        $role = Role::create(['name' => 'Estudiante']);
        /*      $role->givePermissionTo('');
        $role->givePermissionTo(''); */

        $role = Role::create(['name' => 'Docente']);
        /*      $role->givePermissionTo('');
        $role->givePermissionTo(''); */

        $role = Role::create(['name' => 'Coordinador']);
        /*      $role->givePermissionTo('');
        $role->givePermissionTo(''); */

        $role = Role::create(['name' => 'Administrador']);
        /*      $role->givePermissionTo(Permission::all());  */
    }
}
