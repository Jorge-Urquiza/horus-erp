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
            ],//1
            [
                'name' => 'TOYOSA',
                'abbreviation' => 'TOYO',
            ],//2
            
            [
                'name' => 'COIL SEAL',
                'abbreviation' => 'JPK',
            ],//3
            [
                'name' => 'ARCA RETENTORES',
                'abbreviation' => 'ARCA',
            ],//4
            [
                'name' => 'RODAMIENTOS MBA',
                'abbreviation' => 'RD MBA',
                
            ],//5
            [
                'name' => 'PEVISA GASKETS',
                'abbreviation' => 'PEV',
                
            ],//6
            [
                'name' => 'CORTECO',
                'abbreviation' => 'COR',
                
            ],//7
        ];
    }
}
