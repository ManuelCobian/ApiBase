<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionsResource;
use App\Services\PermissionService;

class PermissionController extends Controller implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware('auth:api'),
        ];
    }

     public function __construct(private PermissionService $permissionService) {}


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $permissions = Permission::all();
         return PermissionResource::collection($permissions);  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
         $validated = $request->validated();
         $permmission = $this->permissionService->createPermission($validated);
         return PermissionResource::make($permmission);
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
         return PermissionResource::make($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
         $validated = $request->validated();
         $permission = $this->permissionService->updatePermission($validated, $permission);
         return PermissionResource::make($permission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
        $permission->delete();
        return response()->noContent();
    }
}
