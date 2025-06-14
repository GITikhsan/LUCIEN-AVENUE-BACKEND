<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Menentukan apakah user bisa melihat daftar semua pengguna.
     */
    public function viewAny(User $user): bool
    {
        // Hanya admin yang bisa melihat semua pengguna.
        return $user->role === 'admin';
    }

    /**
     * Menentukan apakah user bisa melihat profil pengguna tertentu.
     */
    public function view(User $user, User $model): bool
    {
        // Izinkan jika:
        // 1. User yang login adalah admin.
        // ATAU
        // 2. User yang login mencoba melihat profilnya sendiri.
        return $user->role === 'admin' || $user->user_id === $model->user_id;
    }

    /**
     * Menentukan apakah user bisa membuat pengguna baru.
     * Dengan aturan baru, admin tidak bisa membuat user dari sini.
     */
    public function create(User $user): bool
    {
        // Admin tidak lagi memiliki izin untuk membuat user baru.
        return false;
    }

    /**
     * Menentukan apakah user bisa mengupdate profil pengguna.
     */
    public function update(User $user, User $model): bool
    {
        // Hanya izinkan jika user mencoba mengupdate profilnya sendiri.
        // Aturan ini sekarang berlaku untuk admin juga.
        return $user->user_id === $model->user_id;
    }

    /**
     * Menentukan apakah user bisa menghapus pengguna.
     */
    public function delete(User $user, User $model): bool
    {
        // Admin tidak lagi memiliki izin untuk menghapus user.
        return false;
    }
}
