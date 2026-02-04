<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'nullable|string|max:100',
            'apellido' => 'nullable|string|max:100',
            'apellido_m' => 'nullable|string|max:100',
            'estado' => 'nullable|string|max:50',
            'email' => 'nullable|string|email|max:100',
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'nullable|exists:roles,id',
            'roles'=> 'array',
            'banned' => 'nullable|boolean'
        ];
    }
}
