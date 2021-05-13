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
                'local_code' => '25256mtl',
                'name' => '80D31L-VOLTA CARGO',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'supplier_id' => 1,
                'category_id' => 1,
                'cost' => 120.0,
                'gain' => 1,
                'price' => 132.0,
            ],
            [
                'local_code' => '2578po',
                'name' => '80D31R-VOLTA CARGADA',
                'brand_id' => 2,
                'measurements_units_id' => 1,
                'supplier_id' => 2,
                'category_id' => 1,
                'cost' => 210.0,
                'gain' => 1,
                'price' => 231.0,
            ],
            [
                'local_code' => '25256xzt',
                'name' => 'BT45-VOLTA CARGADA',
                'brand_id' => 1,
                'measurements_units_id' => 1,
                'supplier_id' => 2,
                'category_id' => 1,
                'cost' => 100,
                'gain' => 2,
                'price' => 120.0,
            ],
            [
                'local_code' => '25opl',
                'name' => 'Goma NBR CAFE',                
                'brand_id' => 3,
                'measurements_units_id' => 1,
                'supplier_id' => 1,
                'category_id' => 1,
                'cost' => 40,
                'gain' => 1,
                'price' => 44.0,
            ],
            [
                'local_code' => '25qwe',
                'name' => 'Goma NBR NEGRO',                
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 1,
                'supplier_id' => 2,
                'cost' => 45,
                'gain' => 2,
                'price' => 54,
            ],
        ];
    }
}
