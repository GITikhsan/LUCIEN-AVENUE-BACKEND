<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $users], 200);
    }

    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
        ]);

        return response()->json(['status' => true, 'message' => 'User Berhasil Dibuat', 'data' => $user], 201);
    }

    public function show(User $user)
    {
        return response()->json(['status' => true, 'data' => $user], 200);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);

        return response()->json(['status' => true, 'message' => 'User Berhasil Diupdate', 'data' => $user], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => true, 'message' => 'User Berhasil Dihapus'], 200);
    }
}
