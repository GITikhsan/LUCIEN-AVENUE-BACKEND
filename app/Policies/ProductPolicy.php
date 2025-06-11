<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User; // Pastikan menggunakan model User
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Menentukan apakah user bisa melihat daftar produk.
     * Siapa saja boleh melihat.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Menentukan apakah user bisa melihat detail produk.
     * Siapa saja boleh melihat.
     */
    public function view(?User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Menentukan apakah user bisa membuat produk baru.
     */
    public function create(User $user): bool
    {
        // Langkah Debugging: Hentikan eksekusi dan tampilkan data user.
        // Jika Anda melihat ini di Postman (dalam bentuk teks HTML panjang),
        // berarti langkah debugging ini berhasil.
        dd('Policy Dijalankan!', $user->toArray());

        // Kode di bawah ini tidak akan dijalankan selama dd() aktif.
        return $user->role === 'admin';
    }


    /**
     * Menentukan apakah user bisa mengupdate produk.
     */
    public function update(User $user, Product $product): bool
    {
        // Hanya user dengan role 'admin' yang boleh mengupdate.
        return $user->role === 'admin';
    }

    /**
     * Menentukan apakah user bisa menghapus produk.
     */
    public function delete(User $user, Product $product): bool
    {
        // Hanya user dengan role 'admin' yang boleh menghapus.
        return $user->role === 'admin';
    }

    // ... (fungsi lainnya bisa dibiarkan atau dihapus)
}
