<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Menangani permintaan registrasi dari pengguna publik.
     */
    public function register(Request $request)
    {
        // Saya tambahkan validasi untuk no_telepon agar lebih aman
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'nullable|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => 'required|string|min:8',
            'no_telepon' => 'nullable|string|max:20', // <-- Perbaikan kecil di sini
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        /** @var \App\Models\User $user */ // <-- INI PERBAIKAN UTAMANYA
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'      => 'Registration successful!',
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ], 201);
    }

    /**
     * Menangani permintaan login.
     */
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Incorrect email or password.'], 401);
        }
        
        /** @var \App\Models\User $user */ // <-- Saya tambahkan juga di sini untuk konsistensi
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ]);
    }

    /**
     * Menangani permintaan logout.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'You have successfully logged out']);
    }
}
