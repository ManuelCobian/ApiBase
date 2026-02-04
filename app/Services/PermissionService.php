<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class PermissionService {

    public function createPermission(array $data): Permission
    {
        return Permission::create([
            'name' => $data['name'],
            'ruta' => $data['ruta'],
            'guard_name' => 'api',
        ]);
    }

    public function updatePermission(array $data,Permission $permission): Permission
    {
        return tap($permission)->update($data)->refresh();
    }    
}