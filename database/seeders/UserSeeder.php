<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

         User::factory()->create([
            'nombre' => 'Luis',
            'apellido' => 'Cobian',
            'apellido_m' => 'Hernandez',
            'estado' => 'Activo',
            'banned' => false,
            'email' => 'lcobianh@gmail.com',
            'password' => bcrypt("12345678"),
        ])->assignRole('Administrador');
    }
}