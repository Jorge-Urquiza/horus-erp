<?php

namespace Database\Seeders;

use App\Models\MeasurementsUnits;
use Illuminate\Database\Seeder;

class UnitMeasurementsSeeder extends Seeder
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
            MeasurementsUnits::create($d);
        }
    }

    public function _getdata()
    {
        return [
            [
                'name' => 'Unidad',
                'abbreviation' => 'Und',
            ],
            [
                'name' => 'Pieza',
                'abbreviation' => 'Pza',
            ],


        ];
    }
}
