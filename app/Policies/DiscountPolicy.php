<?php

namespace App\Policies;

use App\Models\Discount;
use App\Models\User; // <-- Pastikan menggunakan model User
use Illuminate\Auth\Access\Response;

class DiscountPolicy
{
    /**
     * Menentukan apakah user bisa membuat diskon baru.
     */
    public function create(User $user): bool
    {
        // Izinkan hanya jika role user adalah 'admin'.
        return $user->role === 'admin';
    }

    /**
     * Menentukan apakah user bisa mengupdate diskon.
     */
    public function update(User $user, Discount $discount): bool
    {
        // Izinkan hanya jika role user adalah 'admin'.
        return $user->role === 'admin';
    }

    /**
     * Menentukan apakah user bisa menghapus diskon.
     */
    public function delete(User $user, Discount $discount): bool
    {
        // Izinkan hanya jika role user adalah 'admin'.
        return $user->role === 'admin';
    }
}
// Jika Anda ingin menambahkan logika lebih lanjut, misalnya
