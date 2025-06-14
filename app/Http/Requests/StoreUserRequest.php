<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     * Ubah ke `true` agar semua orang (termasuk tamu) bisa melakukan registrasi.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Dapatkan aturan validasi yang berlaku untuk permintaan.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
    return [
        'first_name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255', // <-- Ganti 'required' menjadi 'nullable'
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'no_telepon' => 'required|string|max:15',
        ];
    }
}
