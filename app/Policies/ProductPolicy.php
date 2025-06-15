<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function view(?User $user, Product $product): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        // Diizinkan untuk semua user yang login (sesuai permintaan awal)
        return true;
    }

    public function update(User $user, Product $product): bool
    {
        // Diizinkan untuk semua user yang login (sesuai permintaan awal)
        return true;
    }

    public function delete(User $user, Product $product): bool
    {
        // Hanya admin yang bisa menghapus
        return $user->role === 'admin';
    }
}
