<?php

use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);
Route::post('auth/refresh', [AuthController::class, 'refresh']);
Route::post('auth/me', [AuthController::class, 'me']);

Route::apiResource('permissions', PermissionController::class)->only(['index', 'store', 'update', 'show']);
Route::apiResource('roles', RoleController::class)->only(['index', 'store', 'update', 'show']);
Route::apiResource('users',UserController::class)->only(['index', 'store', 'update', 'show']);
