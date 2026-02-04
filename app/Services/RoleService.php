<?php

namespace App\Services;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleService
{
    public function createRole(array $data): Role
    {
        return DB::transaction(function () use ($data) {
            $role =  Role::create([
                'name' => $data['name'],
                'guard_name' => 'api',
            ]);
            $role->syncPermissions($data['permissions'] ?? []);
            return $role;
        });
    }

    public function updateRole(array $data,Role $role): Role
    {
        return DB::transaction(function () use ($data, $role) {
            $role =  tap($role)->update($data)->refresh();
            $role->syncPermissions($validated['permissions'] ?? []);
            return $role;
        });
    }
}
