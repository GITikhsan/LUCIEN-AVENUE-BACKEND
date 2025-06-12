<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UseProfilerController extends Controller
{
    public function getProfile()
{
    return auth()->user(); // pastikan user login
}

public function updateField(Request $request)
{
    $user = Auth::user();

        // Map label frontend ke field database
        $map = [
            'Nama' => 'nama',
            'E-mail' => 'email',
            'Mobile' => 'mobile',
            'Kata Sandi' => 'password',
            'Tanggal Lahir' => 'tanggal_lahir',
            'Jenis Kelamin' => 'jenis_kelamin',
        ];

        $field = $map[$request->field] ?? null;

        if (!$field) {
            return response()->json(['message' => 'Field tidak dikenali'], 400);
        }

        if ($field === 'password') {
            $user->password = bcrypt($request->value);
        } else {
            $user->$field = $request->value;
        }

        $user->save();

        return response()->json(['message' => 'Berhasil diperbarui']);
}

}
