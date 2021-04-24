<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->_getdata();
        foreach ($data as $key => $d) {
            Supplier::create($d);
        }
    }

    public function _getdata()
    {
        return [
            [
                'name' => 'Jose Coimbra',
                'address' => 'Calle coimbra',
                'type' => 'N',
                'telephone' => 75998787,
                'email' => 'jose@gmail.com',
                
            ],
            [
                'name' => 'Manuel Suarez',
                'address' => 'Calle coimbra Suarez esquina sanchez',
                'telephone' => 7667656,
                'type' => 'N',
                'email' => 'manuel@gmail.com',
                
            ]
        ];
    }
}
