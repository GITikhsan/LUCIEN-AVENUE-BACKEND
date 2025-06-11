<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    /**
     * Handle admin login request.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username_k' => 'required|string',
            'password_k' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $admin = Admin::where('username_k', $request->username_k)->first();

        if (!$admin || !Hash::check($request->password_k, $admin->password_k)) {
            return response()->json(['message' => 'Username atau Password salah'], 401);
        }

        // Kode ini sekarang akan berjalan dengan benar
        $token = $admin->createToken('admin_auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'admin' => $admin
        ]);
    }

    /**
     * Handle admin logout request.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Admin berhasil logout']);
    }
}

