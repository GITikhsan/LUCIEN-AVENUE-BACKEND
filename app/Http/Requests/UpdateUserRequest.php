<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Nanti bisa diganti dengan logic otorisasi
    }

    public function rules(): array
    {
        // Mendapatkan user_id dari route parameter
        $userId = $this->route('user')->user_id;

        return [
            'first_name' => 'sometimes|required|string|max:255',
            // Email harus unik, KECUALI untuk user ini sendiri
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $userId . ',user_id',
            'password' => 'sometimes|nullable|string|min:8|confirmed', // Password tidak wajib diupdate
            'no_telepon' => 'sometimes|required|string|max:15',
        ];
    }
}
