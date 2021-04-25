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
                'name' => 'RETENES JPK',
                'abbreviation' => 'RT JPK',
            ],
            [
                'name' => 'RETENES ARCA',
                'abbreviation' => 'RT ARC',
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
                'name' => 'RODAMIENTOS PFI',
                'abbreviation' => 'RD PFI',
                
            ],
            [
                'name' => 'RODAMIENTOS MP-DRL',
                'abbreviation' => 'RD MP-DRL',
                
            ],
            [
                'name' => 'EMPAQUETADURAS PEVIS',
                'abbreviation' => 'PVS',
                
            ]
        ];
    }
}
