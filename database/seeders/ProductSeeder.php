<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
            Product::create($d);
        }
    }

    public function _getdata()
    {
        return [
            [
                'local_code' => '80D31L',
                'name' => 'RETEN CIGUEÑAL',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'supplier_id' => 1,
                'category_id' => 2,
                'cost' => 120.0,
                'gain' => 10,
                'price' => 132.0,
            ],
            [
                'local_code' => 'B15-83-PFI',
                'name' => 'RODAMIENTOS PFI',
                'brand_id' => 2,
                'measurements_units_id' => 1,
                'supplier_id' => 2,
                'category_id' => 3,
                'cost' => 210.0,
                'gain' => 10,
                'price' => 231.0,
            ],
            [
                'local_code' => 'BT45-KLP',
                'name' => 'VOLTA CARGADA',
                'brand_id' => 1,
                'measurements_units_id' => 1,
                'supplier_id' => 2,
                'category_id' => 1,
                'cost' => 100,
                'gain' => 20,
                'price' => 120.0,
            ],
            [
                'local_code' => 'JPK-260N',
                'name' => 'RETEN DE PIÑON Y CORONA',                
                'brand_id' => 3,
                'measurements_units_id' => 1,
                'supplier_id' => 1,
                'category_id' => 2,
                'cost' => 40,
                'gain' => 10,
                'price' => 44.0,
            ],
            [
                'local_code' => '54071-MLS',
                'name' => 'EMPAQUETADURA CULATA',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 4,
                'supplier_id' => 2,
                'cost' => 45,
                'gain' => 20,
                'price' => 54,
            ],

            [
                'local_code' => 'GUN-26',
                'name' => 'CRUCETA DE DIRECCION',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 5,
                'supplier_id' => 2,
                'cost' => 155,
                'gain' => 20,
                'price' => 186,
            ],
            [
                'local_code' => 'JPK-F144',
                'name' => 'Reten de soporte de cardan',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 2,
                'supplier_id' => 2,
                'cost' => 20,
                'gain' => 20,
                'price' => 24,
            ],
            [
                'local_code' => '12N5-3B KIYOSHI GE',
                'name' => 'BATERIAS SECO CARGADA',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 1,
                'supplier_id' => 2,
                'cost' => 150,
                'gain' => 10,
                'price' => 165
            ],
            [
                'local_code' => 'JPK-W560',
                'name' => 'RETEN HIDRAULICO',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 2,
                'supplier_id' => 2,
                'cost' => 70,
                'gain' => 20,
                'price' => 84,
            ],
            [
                'local_code' => 'JPK-W681',
                'name' => 'Reten de cremallera',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 2,
                'supplier_id' => 2,
                'cost' => 90,
                'gain' => 20,
                'price' => 108,
            ],
        ];
    }
}
