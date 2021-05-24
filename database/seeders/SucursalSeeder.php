<?php

namespace Database\Seeders;

use App\Models\BranchOffice;
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
        BranchOffice::create([
            'name' => 'Casa Matriz',
            'address' => '2do anillo Av. Trompillo',
            'telephone' => '+591 3 3360000',
            'city' => 'Santa Cruz'
        ]);

        BranchOffice::create([
            'name' => 'Sucursal 1',
            'address' => 'Calle Buenos Aires #256',
            'city' => 'Santa Cruz',
            'telephone' => '+591 3 3360001',
        ]);

        BranchOffice::create([
            'name' => 'Sucursal 2',
            'address' => 'Calle uruguay #10',
            'city' => 'Santa Cruz',
            'telephone' => '+591 3 3360002',
        ]);
    }
}
