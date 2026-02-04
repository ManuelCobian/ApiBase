<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService {
    public function createUser(array $data) : User{
        return DB::transaction(function () use ($data) {
            $user =  User::create($data);
            $user->roles()->attach($data['role_id']);
            return $user;
        });
    }

    public function updateUser(array $data,User $user) : User{ 
        return DB::transaction(function () use ($data, $user) {
            $user =  tap($user)->update($data)->refresh();
                $user->roles()->detach();
                $user->roles()->attach($data['role_id']);
            return $user; 
         });
    }
}