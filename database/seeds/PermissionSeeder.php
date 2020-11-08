<?php

use App\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'cursos.index']);
        Permission::create(['name' => 'cursos.create']);
        Permission::create(['name' => 'cursos.store']);
        Permission::create(['name' => 'cursos.edit']);
        Permission::create(['name' => 'cursos.update']);
        Permission::create(['name' => 'cursos.destroy']);

        Permission::create(['name' => 'usuarios.index']);
        Permission::create(['name' => 'usuarios.create']);
        Permission::create(['name' => 'usuarios.store']);
        Permission::create(['name' => 'usuarios.edit']);
        Permission::create(['name' => 'usuarios.update']);
        Permission::create(['name' => 'usuarios.destroy']);

        Permission::create(['name' => 'unidades.create']);
        Permission::create(['name' => 'unidades.store']);
        Permission::create(['name' => 'unidades.show']);
        Permission::create(['name' => 'unidades.edit']);
        Permission::create(['name' => 'unidades.update']);
        Permission::create(['name' => 'unidades.destroy']);

        Permission::create(['name' => 'soportes.index']);
        Permission::create(['name' => 'soportes.create']);
        Permission::create(['name' => 'soportes.store']);
        Permission::create(['name' => 'soportes.edit']);
        Permission::create(['name' => 'soportes.update']);
        Permission::create(['name' => 'soportes.destroy']);

        $admin = Role::create(['name' => 'Admin']);

        $admin->givePermissionTo(Permission::all());

        $estudiante = Role::create(['name' => 'Estudiante']);

        $estudiante->givePermissionTo([
                'cursos.index',
                'unidades.show',
            ]);

        $userAdmin = User::find(1);
        $userAdmin->assignRole($admin->name);

        $userEstudiante = User::find(2);
        $userEstudiante->assignRole($estudiante->name);
        
    }
}
