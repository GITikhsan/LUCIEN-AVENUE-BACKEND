<?php

namespace App\Policies;

use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductImagePolicy
{
    /**
     * Izinkan semua pengguna yang terotentikasi untuk melihat gambar.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Izinkan semua pengguna yang terotentikasi untuk melihat detail gambar.
     */
    public function view(User $user, ProductImage $productImage): bool
    {
        return true;
    }

    /**
     * Hanya admin yang bisa menambahkan gambar produk baru.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Hanya admin yang bisa menghapus gambar produk.
     */
    public function delete(User $user, ProductImage $productImage): bool
    {
        return $user->role === 'admin';
    }
}
