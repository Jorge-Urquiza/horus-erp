<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Alezander',
            'last_name' => 'Vargas Salazar',
            'telephone' => '72030436',
            'ci' => '9588215',
            'email' => 'alex1@gmail.com',
            'password' => bcrypt(123456),
            'branch_office_id' => 1 //Casa matriz ID
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jessica',
            'last_name' => 'Guzman',
            'telephone' => '72030436',
            'ci' => '9588215',
            'email' => 'jessica@gmail.com',
            'password' => bcrypt(123456),
            'branch_office_id' => 2 //Casa matriz ID
        ])->assignRole('Admin');

        User::create([
            'name' => 'Jimmy',
            'email' => 'jimmy@gmail.com',
            'last_name' => 'Guzman',
            'telephone' => '72030436',
            'ci' => '9588215',
            'password' => bcrypt(123456),
            'branch_office_id' => 1 //Casa matriz ID
        ])->assignRole('Vendedor');

        User::create([
            'name' => 'Marlina',
            'email' => 'marlina@gmail.com',
            'last_name' => 'Perez Claros',
            'telephone' => '72030436',
            'ci' => '9588215',
            'password' => bcrypt(123456),
            'branch_office_id' => 1 //Casa matriz ID
        ])->assignRole('Encargado');
    }
}
