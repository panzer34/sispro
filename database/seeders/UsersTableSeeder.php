<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            
            'cedula' => '453453453',
            'address' =>'Av. San Lorenzo',
            'phone' => '84654854',
            'sexo'=> 'M',
            'role'=> 'admin',
        ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456789'),
            
            'cedula' => '766786',
            'address' =>'Av. SanLorenzo',
            'phone' => '353543',
            'sexo'=> 'M',
            'role'=> 'doctor',
        ]);


        User::factory()
        ->count(50)
        ->create();
    }
}
