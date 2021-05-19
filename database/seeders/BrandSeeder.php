<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
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
            Brand::create($d);
        }
    }

    public function _getdata()
    {
        return [
            [
                'name' => 'VOLTA',
                'abbreviation' => 'VOLT',
            ],
            [
                'name' => 'TOYOSA',
                'abbreviation' => 'TOYO',
            ],
            
            [
                'name' => 'COIL SEAL',
                'abbreviation' => 'JPK',
            ],
            [
                'name' => 'ARCA RETENTORES',
                'abbreviation' => 'ARCA',
            ],
            [
                'name' => 'RODAMIENTOS MBA',
                'abbreviation' => 'RD MBA',
                
            ],
            [
                'name' => 'RODAMIENTOS FK',
                'abbreviation' => 'RD MBA',
                
            ],
            [
                'name' => 'PEVISA GASKETS',
                'abbreviation' => 'PEV',
                
            ],
            [
                'name' => 'CORTECO',
                'abbreviation' => 'COR',
                
            ],
        ];
    }
}
