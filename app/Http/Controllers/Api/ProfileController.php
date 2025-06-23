<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
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
            'field' => 'required|string|in:first_name,last_name,email,no_telepon,jenis_kelamin,tanggal_lahir,password', // Sesuaikan dengan field yang boleh diubah
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
    public function getShippingAddress(Request $request)
{
    // 1. Ambil data user yang sedang login
    $user = $request->user();

    // 2. Periksa apakah kolom alamat user kosong atau tidak.
    // INI ADALAH PENYEBAB UTAMA ERROR 404 ANDA.
    // Jika di database kolom 'alamat' untuk user ini NULL/kosong, maka akan error.
    if (empty($user->alamat)) {
        return response()->json(['message' => 'Kolom alamat untuk user ini masih kosong di database.'], 404);
    }

    // 3. Buat struktur JSON yang dibutuhkan oleh frontend Vue.js Anda
    // Kita gunakan nama kolom yang PASTI BENAR dari file migrasi Anda.
    $shippingAddress = [
        'recipientName' => $user->first_name . ' ' . $user->last_name,
        'email'         => $user->email,

        // Nama kolom di migrasi adalah 'no_telepon'
        'phoneNumber'   => $user->no_telepon,

        // Nama kolom di migrasi adalah 'alamat'
        'fullAddress'   => $user->alamat,

        'isDefault'     => true, // Anggap saja selalu default
    ];

    // 4. Kirim data ke frontend
    return response()->json($shippingAddress);
}
    /**
     * Membuat atau mengupdate alamat user.
     */
    public function updateAddress(Request $request)
    {
        // 1. Validasi data yang dikirim dari frontend
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:1000',
            'city' => 'required|string|max:100',
            'label' => 'nullable|string|max:50',
            'note' => 'nullable|string|max:255',
        ]);

        try {
            // 2. Ambil data user yang sedang login
            $user = $request->user();
            if (!$user) {
                return response()->json(['message' => 'User tidak ditemukan.'], 401);
            }

            // 3. Karena tabel 'users' Anda hanya punya satu kolom `alamat`,
            // kita gabungkan datanya menjadi satu string.
            // (Saran: Untuk jangka panjang, lebih baik buat tabel 'addresses' terpisah)
            $fullAddress = "{$validatedData['label']}: {$validatedData['address']}, {$validatedData['city']}. (Penerima: {$validatedData['name']})";

            // 4. Update data di database
            $user->alamat = $fullAddress;
            $user->no_telepon = $validatedData['phone'];
            $user->save();

            // 5. Kirim respons berhasil
            return response()->json([
                'message' => 'Alamat berhasil diperbarui!',
                'user' => $user
            ], 200);

        } catch (\Exception $e) {
            // Jika terjadi error lain, catat di log dan kirim respons error 500
            Log::error('Error updating address: '.$e->getMessage());
            return response()->json(['message' => 'Terjadi kesalahan pada server.'], 500);
        }
    }
    public function destroy(Request $request)
    {
        try {
            // Dapatkan user yang sedang login dari token
            $user = $request->user();

            // Opsional: Log siapa yang menghapus akun untuk audit
            Log::info('User deletion request initiated by user ID: ' . $user->id);

            // Hapus token yang sedang digunakan untuk logout
            $user->currentAccessToken()->delete();

            // Hapus record user dari database
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Your account has been successfully deleted.'
            ], 200);

        } catch (\Exception $e) {
            // Jika terjadi error, log error tersebut
            Log::error('Failed to delete user ID: ' . $request->user()->id . ' - Error: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting your account.'
            ], 500);
        }
    }
}
