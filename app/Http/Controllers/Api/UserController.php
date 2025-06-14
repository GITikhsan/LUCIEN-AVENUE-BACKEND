<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Menampilkan daftar semua pengguna.
     * Hanya bisa diakses oleh admin.
     */
    public function index()
    {
        // Memeriksa hak akses melalui UserPolicy@viewAny
        $this->authorize('viewAny', User::class);

        $users = User::latest()->paginate(10);
        return response()->json(['status' => true, 'data' => $users], 200);
    }

    /**
     * Menyimpan pengguna baru (dibuat oleh admin).
     * Untuk registrasi publik, gunakan AuthController@register.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'role' => $request->input('role', 'admin'), // <-- TAMBAHKAN INI
        ]);
        // Memeriksa hak akses melalui UserPolicy@create
        $this->authorize('create', User::class);

        $validatedData = $request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Memastikan role default adalah 'user' jika tidak dispesifikkan oleh admin
        $validatedData['role'] = $request->input('role', 'user');

        $user = User::create($validatedData);

        return response()->json(['status' => true, 'message' => 'Pengguna berhasil dibuat oleh Admin', 'data' => $user], 201);
    }

    /**
     * Menampilkan detail satu pengguna.
     */
    public function show(User $user)
    {
        // Memeriksa hak akses melalui UserPolicy@view
        $this->authorize('view', $user);

        return response()->json(['status' => true, 'data' => $user], 200);
    }

    /**
     * Mengupdate data pengguna.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // Memeriksa hak akses melalui UserPolicy@update
        $this->authorize('update', $user);

        $validatedData = $request->validated();
        if (isset($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        }

        $user->update($validatedData);

        return response()->json(['status' => true, 'message' => 'Pengguna berhasil diupdate', 'data' => $user], 200);
    }

    /**
     * Menghapus data pengguna.
     */
    public function destroy(User $user)
    {
        // Memeriksa hak akses melalui UserPolicy@delete
        $this->authorize('delete', $user);

        $user->delete();

        return response()->json(['status' => true, 'message' => 'Pengguna berhasil dihapus'], 200);
    }
}
