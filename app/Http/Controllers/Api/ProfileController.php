<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Mengambil data profil user yang sedang login.
     */
    public function getProfile(Request $request)
    {
        // Langsung ambil user dari request yang sudah diautentikasi oleh Sanctum
        return response()->json($request->user());
    }

    /**
     * Mengupdate field tertentu pada profil user.
     */
    public function updateField(Request $request)
    {
        // Langsung ambil user dari request, tidak perlu Auth::user() lagi
        $user = $request->user();

        // Validasi input
        $request->validate([
            'field' => 'required|string|in:first_name,last_name,email,no_telepon,password', // Sesuaikan dengan field yang boleh diubah
            'value' => 'required|string|max:255',
        ]);

        $field = $request->field;
        $value = $request->value;
        
        // Cek jika email yang diupdate sudah ada
        if ($field === 'email' && User::where('email', $value)->where('user_id', '!=', $user->user_id)->exists()) {
            return response()->json(['message' => 'Email sudah digunakan.'], 422);
        }

        if ($field === 'password') {
            $user->password = Hash::make($value);
        } else {
            $user->{$field} = $value;
        }

        $user->save();

        return response()->json([
            'message' => 'Profil berhasil diperbarui',
            'user' => $user,
        ]);
    }
}