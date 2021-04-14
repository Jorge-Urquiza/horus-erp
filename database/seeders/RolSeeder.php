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
        Permission::create(['name' => 'users.index', 'description' => 'Ver lista de usuarios'])
                ->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuarios'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuarios'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'users.create', 'description' => 'Crea usuarios'])
        ->syncRoles([$admin]);

        //permisos - Productos
        Permission::create(['name' => 'productos.index', 'description' => 'Ver lista de productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.edit', 'description' => 'Editar productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.destroy', 'description' => 'Eliminar productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.create', 'description' => 'Crea productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);

        //Categorias
        Permission::create(['name' => 'cateogorias.index', 'description' => 'Ver lista de categorias'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'cateogorias.edit', 'description' => 'Editar categorias'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'cateogorias.destroy', 'description' => 'Eliminar categorias'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'cateogorias.create', 'description' =>  'Crea categorias'])
        ->syncRoles([$admin, $vendedor]);

        //ventas

        Permission::create(['name' => 'ventas.index', 'description' => 'Ver lista de usuarios'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.edit', 'description' => 'Ver lista de usuarios'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.destroy', 'description' => 'Ver lista de usuarios'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.create', 'description' => 'Ver lista de usuarios'])
        ->syncRoles([$admin, $vendedor]);

    }
}
