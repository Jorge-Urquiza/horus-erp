<?php

namespace Database\Seeders;

use App\Models\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([
            'nombre' => 'Casa Matriz',
            'direccion' => 'Calle uruguay #10'
        ]);

        Sucursal::create([
            'nombre' => 'Suc 1',
            'direccion' => 'Calle buenos aires #256'
        ]);
    }
}
