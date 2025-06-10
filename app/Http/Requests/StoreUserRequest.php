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
            // Aturan untuk pendaftaran sederhana
            'first_name' => 'required|string|max:255',
            'last_name'  => 'nullable|string|max:255', // Boleh kosong
            'email'      => 'required|string|email|max:255|unique:users,email', // Wajib, format email, unik di tabel users
            'password'   => 'required|string|min:8', // Wajib, minimal 8 karakter
        ];
    }
}
