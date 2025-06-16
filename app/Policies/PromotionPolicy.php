<?php

namespace App\Policies;

use App\Models\Promotion;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PromotionPolicy
{
    /**
     * Izinkan hanya admin yang bisa membuat promosi.
     */
    public function create(User $user): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Izinkan hanya admin yang bisa mengupdate promosi.
     */
    public function update(User $user, Promotion $promotion): bool
    {
        return $user->role === 'admin';
    }

    /**
     * Izinkan hanya admin yang bisa menghapus promosi.
     */
    public function delete(User $user, Promotion $promotion): bool
    {
        return $user->role === 'admin';
    }
}
