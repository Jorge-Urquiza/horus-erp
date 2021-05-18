<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1
        Category::create([
            'name' => 'Bateria',
        ]);
        //2
        Category::create([
            'name' => 'Reten',
        ]);
            //3
        Category::create([
            'name' => 'Rodamiento',
        ]);
            //4
        Category::create([
            'name' => 'Empaquetadura',
        ]);
            //5
        Category::create([
            'name' => 'Cruceta',
        ]);
    }
}
