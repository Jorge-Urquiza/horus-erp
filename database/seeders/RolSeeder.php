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

        //----ADMINISTRACION----//
         Permission::create(['name' => 'administracion.index', 'description' => 'Ver Modulo Administracion'])
        ->syncRoles([$admin]);
        //Users
        
        Permission::create(['name' => 'users.index', 'description' => 'Ver lista de usuarios'])
                ->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit', 'description' => 'Editar usuarios'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy', 'description' => 'Eliminar usuarios'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'users.create', 'description' => 'Crear usuarios'])
        ->syncRoles([$admin]);

        Permission::create(['name' => 'branch-offices.index', 'description' => 'Ver lista de sucursales'])
                ->syncRoles([$admin]);
        Permission::create(['name' => 'branch-offices.edit', 'description' => 'Editar sucursales'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'branch-offices.destroy', 'description' => 'Eliminar sucursales'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'branch-offices.create', 'description' => 'Crear sucursales'])
        ->syncRoles([$admin]);

        //---INVENTARIO---//
        Permission::create(['name' => 'inventario.index', 'description' => 'Ver Modulo Inventario'])
                ->syncRoles([$admin, $encargado]);

        //permisos - Productos
        Permission::create(['name' => 'productos.index', 'description' => 'Ver lista de productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.edit', 'description' => 'Editar productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.destroy', 'description' => 'Eliminar productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);
        Permission::create(['name' => 'productos.create', 'description' => 'Crear productos'])
        ->syncRoles([$admin, $vendedor, $encargado]);

        //Categorias
        Permission::create(['name' => 'categorias.index', 'description' => 'Ver lista de categorias'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'categorias.edit', 'description' => 'Editar categorias'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'categorias.destroy', 'description' => 'Eliminar categorias'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'categorias.create', 'description' =>  'Crear categorias'])
        ->syncRoles([$admin, $vendedor]);

        //Marca
        Permission::create(['name' => 'brands.index', 'description' => 'Ver lista de marcas'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'brands.edit', 'description' => 'Editar marcas'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'brands.destroy', 'description' => 'Eliminar marcas'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'brands.create', 'description' =>  'Crear marcas'])
        ->syncRoles([$admin]);

        //Unidad Medida
        Permission::create(['name' => 'units.index', 'description' => 'Ver lista de unidad de medidas'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'units.edit', 'description' => 'Editar unidad de medidas'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'units.destroy', 'description' => 'Eliminar unidad de medidas'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'units.create', 'description' =>  'Crear unidad de medidas'])
        ->syncRoles([$admin]);

        //Proveedor
        Permission::create(['name' => 'suppliers.index', 'description' => 'Ver lista de proveedores'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'suppliers.edit', 'description' => 'Editar proveedores'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'suppliers.destroy', 'description' => 'Eliminar proveedores'])
        ->syncRoles([$admin]);
        Permission::create(['name' => 'suppliers.create', 'description' =>  'Crear proveedores'])
        ->syncRoles([$admin]);

        //Branch Product
        Permission::create(['name' => 'branch-products.index', 'description' => 'Ver lista de producto sucursal'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'branch-products.edit', 'description' => 'Actualizar stock producto sucursal'])
        ->syncRoles([$admin, $encargado]);

        //Nota Ingreso
        Permission::create(['name' => 'incomes.index', 'description' => 'Ver lista de nota de ingreso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'incomes.destroy', 'description' => 'Anular nota de ingreso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'incomes.create', 'description' =>  'Crear nota de ingreso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'incomes.pdf', 'description' =>  'Pdf nota de ingreso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'incomes.ingresar', 'description' =>  'Actualizar estado nota de ingreso'])
        ->syncRoles([$admin, $encargado]);

        //Nota Salida
        Permission::create(['name' => 'outputs.index', 'description' => 'Ver lista de nota de salida'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'outputs.destroy', 'description' => 'Anular nota de salida'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'outputs.create', 'description' =>  'Crear nota de salida'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'outputs.pdf', 'description' =>  'Pdf nota de salida'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'outputs.entregar', 'description' =>  'Actualizar estado nota de salida'])
        ->syncRoles([$admin, $encargado]);

        //Nota Traspaso
        Permission::create(['name' => 'transfers.index', 'description' => 'Ver lista de nota de traspaso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'transfers.destroy', 'description' => 'Anular nota de traspaso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'transfers.create', 'description' =>  'Crear nota de traspaso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'transfers.pdf', 'description' =>  'Pdf nota de traspaso'])
        ->syncRoles([$admin, $encargado]);
        Permission::create(['name' => 'transfers.entregar', 'description' =>  'Actualizar estado nota de traspaso'])
        ->syncRoles([$admin, $encargado]);

        //---VENTA---//
        Permission::create(['name' => 'venta.index', 'description' => 'Ver Modulo Venta'])
                ->syncRoles([$admin, $vendedor]);
        //ventas

        Permission::create(['name' => 'ventas.index', 'description' => 'Ver lista de ventas'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.edit', 'description' => 'Editar ventas'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.destroy', 'description' => 'Anular ventas'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'ventas.create', 'description' => 'Crear ventas'])
        ->syncRoles([$admin, $vendedor]);

        //Cliente

        Permission::create(['name' => 'customers.index', 'description' => 'Ver lista de clientes'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'customers.edit', 'description' => 'Editar clientes'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'customers.destroy', 'description' => 'Eliminar clientes'])
        ->syncRoles([$admin, $vendedor]);
        Permission::create(['name' => 'customers.create', 'description' => 'Crear clientes'])
        ->syncRoles([$admin, $vendedor]);

        //---VENTA---//
        Permission::create(['name' => 'configuracion.index', 'description' => 'Ver Modulo Configuracion'])
                ->syncRoles([$admin]);

    }
}
