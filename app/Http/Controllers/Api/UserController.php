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
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => 'Validation error', 'errors' => $validator->errors()], 422);
        }

        $user = User::where('email', 'like', '%' . $request->email . '%')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['status' => false, 'message' => 'Invalid credentials'], 401);
        }

        // Generate a token for the user
        $token = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'data' => $user,
            'token' => $token,
        ], 200);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['status' => true, 'message' => 'Successfully logged out'], 200);
    }
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
            'role' => $request->input('role', 'user'), // <-- TAMBAHKAN INI
        ]);

        return response()->json(['status' => true, 'message' => 'User Created Successfully', 'data' => $user], 201);
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

        return response()->json(['status' => true, 'message' => 'User Successfully Updated', 'data' => $user], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => true, 'message' => 'User Successfully Deleted'], 200);
    }
}
