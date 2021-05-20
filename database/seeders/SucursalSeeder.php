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
            'city' => 'Santa Cruz'
        ]);

        BranchOffice::create([
            'name' => 'Sucursal 1',
            'address' => 'Calle buenos aires #256',
            'city' => 'Santa Cruz'
        ]);

        BranchOffice::create([
            'name' => 'Sucursal 2',
            'address' => 'Calle uruguay #10',
            'city' => 'Santa Cruz'
        ]);
    }
}
