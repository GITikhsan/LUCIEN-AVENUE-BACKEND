<?php

namespace App\Providers;

use App\Models\Product;
use App\Policies\ProductPolicy;
use App\Models\User;
use App\Policies\UserPolicy;
use App\Models\Promotion;
use App\Policies\PromotionPolicy; // <-- 1. Tambahkan import PromotionPolicy
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Product::class => ProductPolicy::class,
        User::class => UserPolicy::class,
        \App\Models\Promotion::class => \App\Policies\PromotionPolicy::class,

    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
