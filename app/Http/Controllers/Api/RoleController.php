<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Resources\RolesResource;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Models\Role;


class RoleController extends Controller implements HasMiddleware
{


    public static function middleware(): array
    {
        return [
            new Middleware('auth:api'),
        ];
    }


    public function __construct(private RoleService $roleService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return RolesResource::collection($roles->load('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $validated = $request->validated();
        $role = $this->roleService->createRole($validated);
        return RolesResource::make($role->load('permissions'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return RolesResource::make($role->load('permissions'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id],
            'permissions' => ['nullable', 'array'],
            'permissions.*' => ['integer', 'exists:permissions,id'],
        ]);

        $role = $this->roleService->updateRole($validated, $role);

        return RolesResource::make($role->load('permissions'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();

        return response()->noContent();
    }
}
