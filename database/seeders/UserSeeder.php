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
            'name' => 'Usuario uno',
            'last_name' => 'Guzman',
            'telephone' => '72030436',
            'ci' => '9588215',
            'email' => 'user1@gmail.com',
            'password' => bcrypt(123456)
        ])->assignRole('Admin');

        User::create([
            'name' => 'Usuario dos',
            'last_name' => 'Guzman',
            'telephone' => '72030436',
            'ci' => '9588215',
            'email' => 'user2@gmail.com',
            'password' => bcrypt(123456)
        ])->assignRole('Admin');

        User::create([
            'name' => 'Usuario vendedor',
            'email' => 'user3@gmail.com',
            'last_name' => 'Guzman',
            'telephone' => '72030436',
            'ci' => '9588215',
            'password' => bcrypt(123456)
        ])->assignRole('Vendedor');

        User::create([
            'name' => 'Juan jose',
            'email' => 'user4@gmail.com',
            'last_name' => 'Perez Claros',
            'telephone' => '72030436',
            'ci' => '9588215',
            'password' => bcrypt(123456)
        ])->assignRole('Encargado');
    }
}
