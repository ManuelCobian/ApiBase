<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        //
        $roles = [
            'Vendedor',
            'Administrador',
            'Propietario',
            'Cliente',
        ];

        foreach($roles as $role) {
            Role::create([
                'name' => $role,
            ]);
        }
    }
}