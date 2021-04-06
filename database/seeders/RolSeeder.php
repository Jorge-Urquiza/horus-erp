<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        $admin = Role::create([
            'name' => 'Admin',
            'description' => 'Administrador de la empresa'
        ]);

        $vendedor = Role::create([
            'name' => 'Vendedor',
            'description' => 'Vendedor de sucursal'
        ]);

        $encargado = Role::create([
            'name' => 'Encargado',
            'description' => 'Encargado de sucursal'
        ]);
        //Users
        Permission::create(['name' => 'users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.create'])->syncRoles([$admin]);

        //permisos - Productos
        Permission::create(['name' => 'productos.index'])->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.destroy'])->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$admin, $vendedor, $encargado]);

        //Categorias
        Permission::create(['name' => 'cateogorias.index'])->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'cateogorias.edit'])->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'cateogorias.destroy'])->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'cateogorias.create'])->syncRoles([$admin, $vendedor]);

        //ventas

        Permission::create(['name' => 'ventas.index'])->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.edit'])->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.destroy'])->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.create'])->syncRoles([$admin, $vendedor]);

    }
}
