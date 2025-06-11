<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Izinkan siapa saja untuk melihat produk.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Izinkan siapa saja untuk melihat detail produk.
     */
    public function view(?User $user, Product $product): bool
    {
        return true;
    }

    /**
     * Hanya user dengan role 'admin' yang bisa membuat produk.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Hanya user dengan role 'admin' yang bisa mengupdate produk.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Hanya user dengan role 'admin' yang bisa menghapus produk.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->role === 'admin';
    }
}
