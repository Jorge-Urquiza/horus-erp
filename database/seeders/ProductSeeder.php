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
                'price' => 170.0,
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'supplier_id' => 1,
                'category_id' => 1,

            ],
            [
                'local_code' => '2578po',
                'name' => '80D31R-VOLTA CARGADA',
                'price' => 250.0,
                'brand_id' => 2,
                'measurements_units_id' => 1,
                'supplier_id' => 2,
                'category_id' => 1,

            ],
            [
                'local_code' => '25256xzt',
                'name' => 'BT45-VOLTA CARGADA',
                'price' => 120,
                'brand_id' => 1,
                'measurements_units_id' => 1,
                'supplier_id' => 2,
                'category_id' => 1,

            ],
            [
                'local_code' => '25opl',
                'name' => 'Goma NBR CAFE',
                'price' => 50.22,
                'brand_id' => 3,
                'measurements_units_id' => 1,
                'supplier_id' => 1,
                'category_id' => 1

            ],
            [
                'local_code' => '25qwe',
                'name' => 'Goma NBR NEGRO',
                'price' => 48.65,
                'brand_id' => 1,
                'measurements_units_id' => 2,
                'category_id' => 1,
                'supplier_id' => 2,

            ],
        ];
    }
}
