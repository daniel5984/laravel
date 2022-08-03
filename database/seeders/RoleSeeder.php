<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//Importar Role e Permission do spatie.be
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Criar o role de Admin e User
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'professor']);
        $role3 = Role::create(['name' => 'user']);

        //Permissões Users
        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$role1]);

        //Permissões Jornadas
        Permission::create(['name' => 'jornadas.index'])->syncRoles([$role1, $role2]); //ver a lista das jornadas
        Permission::create(['name' => 'jornadas.create'])->syncRoles([$role1]); //criar nova edição das jornadas
        Permission::create(['name' => 'jornadas.edit'])->syncRoles([$role1, $role2]); //editar jornadas
        Permission::create(['name' => 'jornadas.destroy'])->syncRoles([$role1, $role2]); //eliminar jornadas

        //Permissões Palestras
        Permission::create(['name' => 'palestras.index'])->syncRoles([$role1, $role2]); //ver a lista das Palestras
        Permission::create(['name' => 'palestras.create'])->syncRoles([$role1]); //criar nova edição das Palestras
        Permission::create(['name' => 'palestras.edit'])->syncRoles([$role1, $role2]); //editar Palestras
        Permission::create(['name' => 'palestras.destroy'])->syncRoles([$role1, $role2]); //eliminar Palestras

        //Permissões Workshops
        Permission::create(['name' => 'workshops.index'])->syncRoles([$role1, $role2]); //ver a lista das Workshops
        Permission::create(['name' => 'workshops.create'])->syncRoles([$role1]); //criar nova edição das Workshops
        Permission::create(['name' => 'workshops.edit'])->syncRoles([$role1, $role2]); //editar Workshops
        Permission::create(['name' => 'workshops.destroy'])->syncRoles([$role1, $role2]); //eliminar Workshops

    }
}
