<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('latacunga'),
        ])->assignRole('Admin');

        User::create([
            'name'=>'Encargado',
            'email'=>'encargado@encargado.com',
            'password'=>bcrypt('latacunga'),
        ])->assignRole('Encargado');

        User::create([
            'name'=>'Cliente',
            'email'=>'cliente@cliente.com',
            'password'=>bcrypt('latacunga')
        ])->assignRole('Cliente');
        

   
}
}